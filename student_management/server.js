require('dotenv').config();
const express = require('express');
const cors = require('cors');
const connectDB = require('./config/dbConfig');
const corsOptions = require('./config/corsOptions');
const studentsRouter = require('./routes/students');

const app = express();

connectDB().then(() => {
  console.log('Connected to MongoDB');
  app.use(cors(corsOptions));
  app.use(express.json());
  app.use('/students', studentsRouter);

  app.listen(process.env.PORT, () => {
    console.log(`Server running on port ${process.env.PORT}`);
  });
}).catch(err => {
  console.error('Failed to connect to MongoDB', err);
});