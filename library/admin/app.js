const express = require('express');
const bodyParser = require('body-parser');
const multer = require('multer');
const path = require('path');

const app = express();
app.use(express.static('public'));
app.use(bodyParser.urlencoded({ extended: true }));

// Initialize multer for file uploads
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, 'public/uploads'); // Save files in the 'uploads' folder
  },
  filename: (req, file, cb) => {
    cb(null, Date.now() + '-' + file.originalname); // Unique filename
  },
});

const upload = multer({ storage }); // Create the upload middleware

// In-memory storage for books and users
let books = [];
let users = [];

// Routes
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/views/index.html');
});

app.get('/admin-dashboard', (req, res) => {
  res.sendFile(__dirname + '/views/admin-dashboard.html');
});

app.post('/', (req, res) => {
  const role = req.body.role;

  if (role === 'Admin') {
    res.redirect('/admin-dashboard');
  } else if (role === 'User') {
    res.redirect('/dashboard');
  } else {
    res.status(400).send('Invalid role selected');
  }
});

app.get('/updatebooks', (req, res) => {
  res.sendFile(__dirname + '/views/updatebooks.html');
});

app.get('/addbooks', (req, res) => {
  res.sendFile(__dirname + '/views/addbooks.html');
});

app.get('/addusers', (req, res) => {
  res.sendFile(__dirname + '/views/addusers.html');
});

app.get('/updateusers', (req, res) => {
  res.sendFile(__dirname + '/views/updateusers.html');
});

// API endpoint to fetch users
app.get('/api/users', (req, res) => {
  res.json(users); // Return the in-memory users array
});

// Handle form submission for adding a new book
app.post('/addbooks', upload.fields([
  { name: 'bookFile', maxCount: 1 },
  { name: 'bookImage', maxCount: 1 },
]), (req, res) => {
  const { title, author, isbn, genre, quantity } = req.body;
  const bookFile = req.files['bookFile'][0].filename;
  const bookImage = req.files['bookImage'][0].filename;

  const newBook = {
    id: books.length + 1,
    title,
    author,
    isbn,
    genre,
    quantity: parseInt(quantity),
    bookFile,
    bookImage,
  };
  books.push(newBook);

  console.log('Books in Memory:', books);
  res.redirect('/updatebooks');
});

// Handle form submission for adding a new user
app.post('/addusers', (req, res) => {
  const { name, email, role } = req.body;

  const newUser = {
    id: users.length + 1,
    name,
    email,
    role,
  };
  users.push(newUser);

  console.log('Users in Memory:', users);
  res.redirect('/updateusers');
});

// User dashboard routes
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