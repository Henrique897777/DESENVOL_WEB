const express = require("express");
const app = express();
const path = require('path');

// CONFIGURAR O EXPRESS PARA USAR ARQUIVOS ESTÁTICOS

app.use(express.static(path.join(__dirname, 'public')));

// ROTA PARA A PÁGINA INICIAL
app.get('/', (req, res) =>{
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// ROTA SOMA
app.get('/somar', (req,res)=> {
    const num1 = parseFloat(req.query.num1);
    const num2 = parseFloat(req.query.num2);

// REALIZA A SOMA
const resultado = num1+num2;

// ENVIAR O RESULTADO COMO RESPOSTA
res.send(`A soma de ${num1} + ${num2} é ${resultado}`);

});

// INICIANDO O SERVIDOR NA PORTA 3000
const PORT = process.env.PORT || 3000;
app.listen(PORT,() =>{
     console.log(`Servidor rodando na porta ${PORT}`);
    });