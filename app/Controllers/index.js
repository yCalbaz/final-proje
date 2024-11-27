const express = require('express');
const app = express();
const port = 3000;
const bcrypt = require('bcrypt');
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

const userSchema = new mongoose.Schema({
    email: { type: String, required: true },
    password: { type: String, required: true }
});

const User = mongoose.model('Kullanici', userSchema);

app.post('/add-user', async (req, res) => {
    const { email, password } = req.body;

    if (!email || !password) {
        return res.status(400).send('Kullanıcı adı ve şifre gerekli.');
    }

    if (typeof password !== 'string') {
        return res.status(400).send('Şifre geçerli bir string olmalıdır.');
    }

    try {
        const hashedPassword = await bcrypt.hash(password, 10);
        console.log(`Kullanıcı: ${email}, Hashlenmiş Şifre: ${hashedPassword}`);

        const newUser = new User({ email, password: hashedPassword });
        await newUser.save();

        res.status(201).send(`Kullanıcı eklendi! Kullanıcı: ${email},Şifre: ${hashedPassword}`);
    } catch (error) {
        console.error(error);
        res.status(500).send('Veritabanına kaydedilirken bir hata oluştu.');
    }
});

app.get('/', (req, res) => {
    res.send('Hello,deneme');
});

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
