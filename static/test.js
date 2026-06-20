const courses = {
    programming: {
        title: "Programming Languages",
        description: "Learn various programming languages like Python, JavaScript, and C++.",
        topics: ["Python", "JavaScript", "C++"]
    },
    datascience: {
        title: "Data Science",
        description: "Explore data science techniques and tools for data analysis, visualization, and machine learning.",
        topics: ["Data Analysis", "Machine Learning", "Data Visualization"]
    },
    ai: {
        title: "Artificial Intelligence",
        description: "Understand AI concepts such as neural networks and machine learning.",
        topics: ["Deep Learning", "Neural Networks", "NLP"]
    }
};

// Store selected course ID for use on the details page
let selectedCourseId = "";

// Handle dropdown selection and store selected course ID
document.addEventListener("DOMContentLoaded", () => {
    const dropdown = document.getElementById("course-dropdown");
    const navigateLink = document.getElementById("navigate-link");

    dropdown.addEventListener("change", (event) => {
        selectedCourseId = event.target.value;
    });

    navigateLink.addEventListener("click", (event) => {
        event.preventDefault();
        localStorage.setItem("selectedCourseId", selectedCourseId);
        window.location.href = navigateLink.href;
    });

    // Check if we're on the details page and populate content
    if (document.getElementById("course-title")) {
        const courseId = localStorage.getItem("selectedCourseId");
        if (courseId && courses[courseId]) {
            const course = courses[courseId];
            document.getElementById("course-title").textContent = course.title;
            document.getElementById("course-description").textContent = course.description;

            const topicsList = document.getElementById("course-topics");
            course.topics.forEach(topic => {
                const li = document.createElement("li");
                li.textContent = topic;
                topicsList.appendChild(li);
            });
        }
    }
});
