const express = require('express');
const router = express.Router();
const { GetAllStudents, GetStudent, CreateNewStudent, UpdateStudent, DeleteStudent } = require('../controllers/studentController');

router.get('/', GetAllStudents);
router.get('/:id', GetStudent);
router.post('/', CreateNewStudent);
router.put('/', UpdateStudent);
router.delete('/', DeleteStudent);

module.exports = router;