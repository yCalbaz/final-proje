const express = require('express');
const app = express();
const port = 3000;
const bcrypt = require('bcrypt');


app.use(express.json());

const users = []; 



app.post('/add-user',async (req, res) => { //async  uzun sürecek işlemleri arka planda çalıştırarak, kullanıcının web sayfasının kilitlenmesini önlemek için kullanılır.
    
    const { email, password } = req.body; 

   
    if (!email || !password) {
        return res.status(400).send('Kullanıcı adı gerekli.'); // 404 olan bu, istemcinin (örneğin, bir web tarayıcısı) sunucuya gönderdiği isteğin geçersiz veya hatalı olduğunu belirtir.
    }

    

    // password'ün bir string olduğunu kontrol et
    if (typeof password !== 'string') {
        return res.status(400).send('Şifre geçerli bir string olmalıdır.');
    }
    

    const hashedPassword = await bcrypt.hash(password, 10); // Parolayı hashledik 
    // Kullanıcı adı ve hashlenmiş şifreyi terminalde göster
    console.log(`Kullanıcı: ${email}, Hashlenmiş Şifre: ${hashedPassword}`)
    users.push({ email, password: hashedPassword });

    res.status(201).send( `kullanıcı eklendi! Kullanıcı: ${email}, Hashlenmiş Şifre: ${hashedPassword}` ); //202 olan Bu, sunucunun istemcinin isteğini başarıyla işlediğini ve yeni bir kaynağın oluşturulduğunu belirtir.
});

app.get('/', (req, res) => {
    res.send('Hello,deneme');
});

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});