const express = require('express');
const app = express();
const port = 3000;
const Joi = require('joi');
const mongoose = require('mongoose');
const bodyParser = require('body-parser'); 
const cors = require('cors'); 
const multer = require('multer'); 
const path = require('path');

app.use(cors()); 
app.use(bodyParser.json());
app.use(express.json());

const storage = multer.diskStorage({ 
    destination: (req, file, cb) => { 
        cb(null, path.join(__dirname, 'uploads')); 
    }, 
    filename: (req, file, cb) => { 
        cb(null, `${Date.now()}-${file.originalname}`); 
    } 
}); 
const upload = multer({ storage: storage });

mongoose.connect('mongodb+srv://kayze_05:kayze12345@kutuphanedb.nwmtbcm.mongodb.net/?retryWrites=true&w=majority&appName=Kutuphanedb', {
    serverSelectionTimeoutMS: 30000 // Zaman aşımını 30 saniyeye çıkar
})
.then(() => {
    console.log('MongoDB bağlantısı kuruldu');
})
.catch((err) => {
    console.error('MongoDB bağlantısı kurulamadı:', err);
});

const urunSchema = new mongoose.Schema({ 
    id: { type: String, required: true, unique: true }, 
    ad: { type: String, required: true }, 
    marka: { type: String, required: true }, 
    adet: { type: String, required: true },
    fiyat: { type: Number, required: true }, // Fiyat alanını ekleyin
    resim: { type: String, required: false }
});
const Urun = mongoose.model('Urun', urunSchema);

app.post('/urun', upload.single('resim'), async (req, res) => {
    const schema = Joi.object({ 
        id: Joi.string().pattern(/^\d+$/).required(), 
        ad: Joi.string().required(), 
        marka: Joi.string().pattern(/^[^\d]+$/).required(), 
        adet: Joi.string().pattern(/^\d+$/).required(),
        fiyat: Joi.number().required(), // Fiyat alanını ekleyin
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

app.delete('/urun/:id', async (req, res) => { 
    const { id } = req.params; 
    try { const urun = await Urun.findOneAndDelete({ id: id }); 
    if (!urun) { 
        return res.status(404).send('Ürün bulunamadı.'); 
    } res.send('Ürün başarıyla silindi.'); 
    } catch (err) { 
        res.status(400).send('Ürün silinirken bir hata oluştu: ' + err.message); 
    } 
});

app.patch('/urun/:id', async (req, res) => { 
    const { id } = req.params; 
    const schema = Joi.object({ 
        ad: Joi.string(), 
        marka: Joi.string().pattern(/^[^\d]+$/), 
        adet: Joi.string().pattern(/^\d+$/),
        fiyat: Joi.number() // Fiyat alanını ekleyin
    }); 
    const { error } = schema.validate(req.body); 
    if (error) { 
        return res.status(400).send(error.details[0].message); 
    } 
    const { ad, marka, adet, fiyat } = req.body; 
    try { 
        const urun = await Urun.findOneAndUpdate( 
            { id: id }, 
            { $set: { ad, marka, adet, fiyat } }, 
            { new: true, runValidators: true } 
        );
        if (!urun) { 
            return res.status(404).send('Ürün bulunamadı.'); 
        } 
        res.send('Ürün başarıyla güncellendi.'); 
    } catch (err) { 
        res.status(400).send('Ürün güncellenirken bir hata oluştu: ' + err.message);
    } 
});

app.get('/urun', async (req, res) => { 
    try { 
        const urunler = await Urun.find(); 
        res.json(urunler); 
    } catch (err) { 
        res.status(500).send('Ürünler getirilirken bir hata oluştu: ' + err.message); 
    } 
});

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
