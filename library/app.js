const express = require('express');
const bodyParser = require('body-parser');
const request = require('request');
const https = require('https');


const app = express();
app.use(express.static('public'));


app.use(bodyParser.urlencoded({ extended: true }));


app.get('/', (req, res) => {
  res.sendFile(__dirname + '/views/index.html');
});

app.post('/', (req, res) => {
  res.redirect('/dashboard')
})

app.get('/dashboard', (req, res) => {
  res.sendFile(__dirname + '/views/dashboard.html');
});

app.get('/dashboard/bookstore', (req, res) => {
  res.sendFile(__dirname + '/views/bookstore.html');
});

app.get('/dashboard/mylibrary_b', (req, res) => {
  res.sendFile(__dirname + '/views/borrowed-db.html');
});

app.get('/dashboard/mylibrary_r', (req, res) => {
  res.sendFile(__dirname + '/views/returned-db.html');
});

app.listen(process.env.PORT || 3000, () => {
  console.log('Server is running on port 3000');
});