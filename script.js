

// =====================================
// LOGIN
// =====================================

const loginForm = document.getElementById("loginForm");

if (loginForm) {

    loginForm.addEventListener("submit", function (e) {

        e.preventDefault();

        const email = document.getElementById("loginEmail").value.trim();
        const password = document.getElementById("loginPassword").value.trim();
        const error = document.getElementById("loginError");

        error.innerHTML = "";


        alert("Account Created Successfully!");

        if (email === "" || password === "") {

            error.innerHTML = "Please enter your email and password.";

            return;

        }

        if (email === validEmail && password === validPassword) {

            alert("Login Successful!");

            window.location.href = "dashboard.html";

        }

        else {

            error.innerHTML = "Invalid email or password.";

        }

    });

}



// =====================================
// REGISTER
// =====================================

const registerForm = document.getElementById("registerForm");

if (registerForm) {

    registerForm.addEventListener("submit", function (e) {

        e.preventDefault();

        const name = document.getElementById("name").value.trim();
        const studentId = document.getElementById("studentId").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPassword").value;
        const error = document.getElementById("registerError");

        error.innerHTML = "";

        if (name.length < 3) {

            error.innerHTML = "Name must contain at least 3 characters.";

            return;

        }

        if (studentId === "") {

            error.innerHTML = "Student ID is required.";

            return;

        }

        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        if (!email.match(emailPattern)) {

            error.innerHTML = "Please enter a valid email.";

            return;

        }

        if (password.length < 6) {

            error.innerHTML = "Password must be at least 6 characters.";

            return;

        }

        if (password !== confirmPassword) {

            error.innerHTML = "Passwords do not match.";

            return;

        }

        alert("Account Created Successfully!");

        window.location.href = "login.html";

    });

}



// =====================================
// PASSWORD SHOW / HIDE
// =====================================

// =====================================
// PASSWORD SHOW / HIDE
// =====================================

document.querySelectorAll(".toggle-password").forEach(function (eye) {

    eye.addEventListener("click", function () {

        const input = eye.previousElementSibling;

        if (input.type === "password") {

            input.type = "text";

            eye.classList.replace(
                "fa-eye",
                "fa-eye-slash"
            );

        } else {

            input.type = "password";

            eye.classList.replace(
                "fa-eye-slash",
                "fa-eye"
            );

        }

    });

});


// =====================================
// PAGE NAVIGATION
// =====================================

function showPage(pageId) {

    document.querySelectorAll(".page").forEach(function (page) {

        page.classList.remove("active");

    });

    const selectedPage = document.getElementById(pageId);

    if (selectedPage) {

        selectedPage.classList.add("active");

    }

    document.querySelectorAll(".sidebar nav a").forEach(function (link) {

        link.classList.remove("active-link");

    });

    const selectedLink = document.querySelector(
        `.sidebar nav a[onclick="showPage('${pageId}')"]`
    );

    if (selectedLink) {

        selectedLink.classList.add("active-link");

    }

}

document.querySelectorAll(".toggle-password").forEach(function (eye) {

    eye.addEventListener("click", function () {

        const input = eye.previousElementSibling;

        if (input.type === "password") {

            input.type = "text";

            eye.classList.replace("fa-eye", "fa-eye-slash");

        }

        else {

            input.type = "password";

            eye.classList.replace("fa-eye-slash", "fa-eye");

        }

    });

});



// =====================================
// PAGE NAVIGATION
// =====================================

function showPage(pageId) {

    document.querySelectorAll(".page").forEach(function (page) {

        page.classList.remove("active");

    });

    document.getElementById(pageId).classList.add("active");

    document.querySelectorAll(".sidebar nav a").forEach(function (link) {

        link.classList.remove("active-link");

    });

    document.querySelector(`.sidebar nav a[onclick="showPage('${pageId}')"]`)
        .classList.add("active-link");

}



// =====================================
// CURRENT DATE & TIME
// =====================================

function updateClock() {

    const element = document.getElementById("currentDate");

    if (!element) return;

    const now = new Date();

    const options = {

        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric"

    };

    element.innerHTML =
        now.toLocaleDateString("en-US", options) +
        " | " +
        now.toLocaleTimeString();

}

updateClock();

setInterval(updateClock, 1000);



// =====================================
// HERO SLIDESHOW
// =====================================

const slide = document.getElementById("slide");

if (slide) {

    const images = [

        "images/slide1.jpg",
        "images/slide2.jpg",
        "images/slide3.jpg",
        "images/slide4.png"

    ];

    let current = 0;

    setInterval(function () {

        slide.style.opacity = 0;

        setTimeout(function () {

            current++;

            if (current >= images.length) {

                current = 0;

            }

            slide.src = images[current];

            slide.style.opacity = 1;

        }, 400);

    }, 4000);

}



// =====================================
// COURSE REGISTRATION
// =====================================

function registerCourse(button) {

    const course = button.parentElement.querySelector("h3").innerText;

    alert("Successfully registered for:\n\n" + course);

    button.innerHTML = "Registered";

    button.disabled = true;

    button.style.background = "#2e7d32";

}



// =====================================
// GPA CALCULATOR
// =====================================

function calcGPA() {

    const grade = parseFloat(document.getElementById("grade").value);

    const result = document.getElementById("result");

    if (isNaN(grade)) {

        result.innerHTML = "Please enter a GPA.";

        return;

    }

    if (grade < 0 || grade > 4) {

        result.innerHTML = "GPA must be between 0 and 4.";

        return;

    }

    if (grade >= 3.5) {

        result.innerHTML = "Excellent GPA";

    }

    else if (grade >= 3.0) {

        result.innerHTML = "Very Good GPA";

    }

    else if (grade >= 2.0) {

        result.innerHTML = "Good GPA";

    }

    else {

        result.innerHTML = "Need Improvement";

    }

}



// =====================================
// SEARCH
// =====================================

const searchInput = document.querySelector(".search-box input");

if (searchInput) {

    searchInput.addEventListener("keyup", function () {

        const keyword = this.value.toLowerCase();

        document.querySelectorAll(".dashboard-card").forEach(function(card){

            const text = card.innerText.toLowerCase();

            if(text.includes(keyword)){

                card.style.display="flex";

            }

            else{

                card.style.display="none";

            }

        });

    });

}



// =====================================
// DASHBOARD CARD CLICK
// =====================================

const dashboardCards = document.querySelectorAll(".dashboard-card");

dashboardCards.forEach(function(card,index){

    card.style.cursor="pointer";

    card.addEventListener("click",function(){

        switch(index){

            case 0:

                showPage("profile");

                break;

            case 1:

                showPage("announcements");

                break;

            case 2:

                showPage("courses");

                break;

            case 3:

                showPage("gpa");

                break;

        }

    });

});



// =====================================
// DARK MODE
// =====================================

const themeBtn = document.querySelector(".theme-btn");

if(themeBtn){

    themeBtn.addEventListener("click",function(){

        document.body.classList.toggle("dark-mode");

    });

}


