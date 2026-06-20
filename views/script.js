const express = require('express');
const mongoose = require('mongoose');
const app = express();
const cors = require('cors');

// Middleware
app.use(express.json());
app.use(cors());

// MongoDB connection
const dbUri = 'mongodb://localhost:27017/mydatabase'; // Replace with your MongoDB URI if needed
mongoose.connect(dbUri, { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('Connected to MongoDB'))
  .catch(err => console.error('Error connecting to MongoDB:', err));

// Define schemas
const CategorySchema = new mongoose.Schema({
  name: { type: String, required: true },
});

const CourseSchema = new mongoose.Schema({
  name: { type: String, required: true },
  categoryId: { type: mongoose.Schema.Types.ObjectId, ref: 'Category', required: true },
});

// Models
const Category = mongoose.model('Category', CategorySchema);
const Course = mongoose.model('Course', CourseSchema);

// Populate database with sample data (Run this only once or conditionally)
async function populateData() {
  try {
    // Clear existing data
    await Category.deleteMany();
    await Course.deleteMany();

    // Create sample categories
    const categories = [
      { name: 'Programming' },
      { name: 'Design' },
      { name: 'Marketing' },
    ];
    const savedCategories = await Category.insertMany(categories);

    // Create sample courses
    const courses = [
      { name: 'Web Development', categoryId: savedCategories[0]._id },
      { name: 'Data Science', categoryId: savedCategories[0]._id },
      { name: 'UI/UX Design', categoryId: savedCategories[1]._id },
      { name: 'Graphic Design', categoryId: savedCategories[1]._id },
      { name: 'Digital Marketing', categoryId: savedCategories[2]._id },
      { name: 'SEO Basics', categoryId: savedCategories[2]._id },
    ];
    await Course.insertMany(courses);

    console.log('Sample data populated successfully');
  } catch (error) {
    console.error('Error populating sample data:', error);
  }
}

// Uncomment the following line to populate data when starting the server
// populateData();

// API endpoint to fetch courses with categories
app.get('/api/courses', async (req, res) => {
  try {
    const courses = await Course.find().populate('categoryId', 'name');
    const data = courses.map(course => ({
      name: course.name,
      category: { name: course.categoryId.name },
    }));
    res.json(data);
  } catch (error) {
    res.status(500).send({ error: 'Error fetching courses' });
  }
});

// Start the server
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
