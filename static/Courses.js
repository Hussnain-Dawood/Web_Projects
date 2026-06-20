const courses = {
    programming: {
        title: "Programming Languages",
        description: "Learn various programming languages like Python, JavaScript, and C++. Dive deep into the fundamentals of coding.",
        topics: [
            "Python: A versatile language for web, data analysis, and AI.",
            "JavaScript: Essential for front-end and server-side applications.",
            "C++: High-performance language used in game and system development."
        ]
    },
    datascience: {
        title: "Data Science",
        description: "Explore data science techniques and tools for data analysis, visualization, and machine learning.",
        topics: [
            "Python: Libraries like Pandas, NumPy, and Scikit-learn.",
            "R: Statistical programming for analysis and visualization.",
            "Tableau: Data visualization made simple."
        ]
    },
    ai: {
        title: "Artificial Intelligence",
        description: "Dive into AI concepts like machine learning, neural networks, and natural language processing.",
        topics: [
            "Neural Networks: Inspired by the human brain.",
            "Deep Learning: Advanced AI for complex tasks.",
            "NLP: Enable machines to understand human language."
        ]
    }
};

// Select all dropdown elements
const dropdowns = document.getElementsByClassName("dropdown-content");

// Loop over each dropdown element
for (let i = 0; i < dropdowns.length; i++) {
    // Add event listener for each dropdown
    dropdowns[i].addEventListener("change", function () {
        const selectedCourse = this.value;  // Get the selected value

        // Check if the selected course exists in the courses object
        if (courses[selectedCourse]) {
            const course = courses[selectedCourse];

            // Generate the content dynamically based on the selected course
            const courseContent = `
                <h3>${course.title}</h3>
                <p>${course.description}</p>
                <ul>
                    ${course.topics.map(topic => `<li>${topic}</li>`).join('')}
                </ul>
            `;

            // Insert the content into the "AllCourses" div
            document.getElementById("AllCourses").innerHTML = courseContent;
        } else {
            document.getElementById("AllCourses").innerHTML = '<p>Select a valid course</p>';
        }
    });
}
