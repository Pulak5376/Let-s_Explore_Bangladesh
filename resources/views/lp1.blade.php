<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project Card</title> 
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .project-card:hover {
            background-color: #eee;
        }

        .project-card.clicked {
            background-color: #cfc;
        }

        .project-card img {
            width: 100%;
            height: auto;
            margin-top: 10px;
        }

    </style>  
</head>
<body>

    <div class="container">
        <div class="project-card" id="project1">
            <img src="C:\Users\Administrator\Desktop\Let-s_Explore_Bangladesh\resources\views\images\pic.jpeg" alt="Project Image">
            <h3 class="title">My First Project</h3>
            <p class="description">This project is our Web Enginerring lab project.</p>
        </div>
    </div>

    <script>
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('click', function () {
                const title = this.querySelector('.title').innerText;
                const description = this.querySelector('.description').innerText;
                alert(`Project: ${title}Description: ${description}`);
                this.classList.add('clicked');
            });
        });
    </script>

</body>
</html>
