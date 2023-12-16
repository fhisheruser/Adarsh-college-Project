<?php include('MAINHEAD.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/> 

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shastri (B.A) in Sahitya Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #555;
        }

        ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Shastri (B.A) in Sahitya Course</h1>
        <p>
            Shastri (B.A) in Sahitya is an academic program focused on the study of Sahitya, which encompasses the rich literary traditions of Sanskrit. This course provides students with a deep understanding of classical Sanskrit literature, poetry, and literary analysis.
        </p>

        <h2>Course Overview:</h2>
        <ul>
            <li><strong>Duration:</strong> Typically, Shastri (B.A) in Sahitya is a three-year undergraduate program.</li>
            <li><strong>Objective:</strong> The primary objective is to impart knowledge of classical Sanskrit literature, fostering an appreciation for literary forms and expressions.</li>
            <li><strong>Curriculum:</strong> The curriculum includes the study of classical Sanskrit texts, poetic forms, and literary analysis.</li>
        </ul>

        <h2>Core Subjects:</h2>
        <ul>
            <li><strong>Classical Sanskrit Literature:</strong> In-depth study of major works of classical Sanskrit literature, including epics, dramas, and poetic compositions.</li>
            <li><strong>Literary Analysis:</strong> Techniques for analyzing and interpreting Sanskrit literary works, understanding themes, and stylistic elements.</li>
            <li><strong>Poetry Forms:</strong> Exploration of various poetic forms in Sanskrit literature, including meters, rhyme, and structure.</li>
            <li><strong>Dramatic Literature:</strong> Study of classical Sanskrit dramas, understanding the nuances of theatrical expression.</li>
        </ul>

        <h2>Career Opportunities:</h2>
        <ul>
            <li><strong>Teaching:</strong> Graduates can pursue a career as Sanskrit literature teachers at schools, colleges, or universities.</li>
            <li><strong>Research:</strong> Opportunities for further studies and research in classical Sanskrit literature and literary criticism.</li>
            <li><strong>Writing and Translation:</strong> Engaging in writing, translating, or editing Sanskrit literary works for wider audiences.</li>
            <li><strong>Cultural Preservation:</strong> Contribution to the preservation and promotion of Sanskrit literary heritage.</li>
        </ul>

        <h2>Further Studies:</h2>
        <ul>
            <li><strong>M.A in Sahitya:</strong> Pursuing a master's degree for a deeper understanding of advanced literary concepts and research.</li>
            <li><strong>Ph.D. in Sanskrit Literature:</strong> For those inclined towards research, a Ph.D. offers the opportunity to contribute to the field.</li>
        </ul>

        <button onclick="applyNow()">Apply</button>
    </div>

    <script>
        function applyNow() {
            alert("You are applying for the Shastri (B.A) in Sahitya course. Best of luck!");
            window.location.href = 'admissionform.php';         }
    </script>
</body>
<?php include('footer.php') ?>
</html>
