const express = require('express');
const app = express();
const port = 3000;
const Joi = require('joi');
const mongoose = require('mongoose');

app.use(express.json());

mongoose.connect('mongodb+srv://kayze_05:kayze12345@kutuphanedb.nwmtbcm.mongodb.net/?retryWrites=true&w=majority&appName=Kutuphanedb', {
    useNewUrlParser: true,
    useUnifiedTopology: true,
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
    adet: { type: String, required: true } 
});
const Urun = mongoose.model('Urun', urunSchema);

app.post('/urun', async (req, res) => { 
    const schema = Joi.object({ 
        id: Joi.string().pattern(/^\d+$/).required(), 
        ad: Joi.string().required(), 
        marka: Joi.string().pattern(/^[^\d]+$/).required(), 
        adet: Joi.string().pattern(/^\d+$/).required() 
    }); 
    const { error } = schema.validate(req.body); 
    if (error) { 
        return res.status(400).send(error.details[0].message); 
    } 
    const { id, ad, marka, adet } = req.body; 
    try { 
        const yeniUrun = new Urun({ id, ad, marka, adet }); 
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
        adet: Joi.string().pattern(/^\d+$/) 
    }); 
        const { error } = schema.validate(req.body); 
        if (error) { 
            return res.status(400).send(error.details[0].message); 
        } 
        const { ad, marka, adet } = req.body; 
        
        try { 
            const urun = await Urun.findOneAndUpdate( 
                { id: id }, 
                { $set: { ad, marka, adet } }, 
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

    app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
