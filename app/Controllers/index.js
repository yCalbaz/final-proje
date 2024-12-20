const express = require('express');
const app = express();
const port = 3000;
const Joi = require('joi');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const cors = require('cors');
const multer = require('multer');
const path = require('path');

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use(express.json());

// Statik dosya servisi
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

// Multer ayarları
const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        const uploadDir = path.join(__dirname, 'uploads');
        cb(null, uploadDir);
    },
    filename: (req, file, cb) => {
        cb(null, `${Date.now()}-${file.originalname}`);
    }
});
const upload = multer({ storage: storage });

// MongoDB bağlantısı
mongoose.connect('mongodb+srv://kayze_05:kayze12345@kutuphanedb.nwmtbcm.mongodb.net/?retryWrites=true&w=majority&appName=Kutuphanedb', {
    serverSelectionTimeoutMS: 30000
})
.then(() => {
    console.log('MongoDB bağlantısı kuruldu');
})
.catch((err) => {
    console.error('MongoDB bağlantısı kurulamadı:', err);
});

// Mongoose Şeması
const urunSchema = new mongoose.Schema({
    id: { type: String, required: true, unique: true },
    ad: { type: String, required: true },
    marka: { type: String, required: true },
    adet: { type: String, required: true },
    fiyat: { type: Number, required: true },
    resim: { type: String, required: false }
});
const Urun = mongoose.model('Urun', urunSchema);

// Ürün Ekleme
app.post('/urun', upload.single('resim'), async (req, res) => {
    const schema = Joi.object({
        id: Joi.string().pattern(/^\d+$/).required(),
        ad: Joi.string().required(),
        marka: Joi.string().pattern(/^[^\d]+$/).required(),
        adet: Joi.string().pattern(/^\d+$/).required(),
        fiyat: Joi.number().required(),
        resim: Joi.string().allow('').optional()
    });
    const { error } = schema.validate(req.body);
    if (error) {
        return res.status(400).send(error.details[0].message);
    }
    const { id, ad, marka, adet, fiyat } = req.body;
    const resim = req.file ? req.file.filename : null;
    try {
        const yeniUrun = new Urun({ id, ad, marka, adet, fiyat, resim });
        await yeniUrun.save();
        res.status(201).send('Ürün başarıyla eklendi.');
    } catch (err) {
        res.status(400).send('Ürün eklenirken bir hata oluştu: ' + err.message);
    }
});

// Ürün Listeleme
app.get('/urunler', async (req, res) => {
    try {
        const urunler = await Urun.find({});
        const urunlerWithImageUrl = urunler.map(urun => ({
            ...urun.toObject(),
            resimUrl: urun.resim ? `http://localhost:3000/uploads/${urun.resim}` : null
        }));
        res.json(urunlerWithImageUrl);
    } catch (err) {
        res.status(500).send('Ürünler alınamadı: ' + err.message);
    }
});
// Ürün Güncelleme
app.patch('/urun/:id', async (req, res) => {
    const { id } = req.params;
    const { ad, marka, adet, fiyat } = req.body;
    try {
        const updatedUrun = await Urun.findOneAndUpdate(
            { id: id },
            { $set: { ad, marka, adet, fiyat } },
            { new: true, runValidators: true }
        );
        if (!updatedUrun) {
            return res.status(404).send('Ürün bulunamadı.');
        }
        res.json(updatedUrun);
    } catch (err) {
        res.status(400).send('Ürün güncellenirken bir hata oluştu: ' + err.message);
    }
});

// Ürün Silme
app.delete('/urun/:id', async (req, res) => {
    const { id } = req.params;
    try {
        const urun = await Urun.findOneAndDelete({ id: id });
        if (!urun) {
            return res.status(404).send('Ürün bulunamadı.');
        }
        res.status(200).send('Ürün başarıyla silindi');
    } catch (err) {
        res.status(400).send('Silme hatası: ' + err.message);
    }
});

// Sunucu Başlatma
app.listen(port, () => {
    console.log(`Sunucu http://localhost:${port} adresinde çalışıyor`);
});
