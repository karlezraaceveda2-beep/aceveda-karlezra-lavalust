<?php /** @var array $student */ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile - Renato Tamayo</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
            min-height: 100vh;
        }

        /* Navigation */
        nav {
            background: #1e3a8a;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            color: #dbeafe;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .nav-links a:hover {
            color: white;
        }

        /* Main */
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 75px);
            padding: 40px 20px;
        }

        .profile-card {
            background: white;
            width: 100%;
            max-width: 760px;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .profile-header {
            background: #2563eb;
            color: white;
            padding: 35px;
            text-align: center;
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
        }

        .profile-header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .profile-header p {
            opacity: 0.9;
            font-size: 15px;
        }

        .profile-body {
            padding: 35px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .info-item {
            background: #f8fafc;
            padding: 18px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .info-item span {
            display: block;
        }

        .label {
            font-size: 13px;
            font-weight: bold;
            color: #64748b;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .value {
            font-size: 16px;
            color: #1e293b;
            font-weight: 600;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .back-button {
            display: inline-block;
            margin-top: 30px;
            background: #2563eb;
            color: white;
            padding: 12px 22px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        @media (max-width: 650px) {
            nav {
                flex-direction: column;
                gap: 15px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .profile-body {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <nav>

        <div class="logo">
            Student Portal
        </div>

        <div class="nav-links">

            <a href="<?= site_url('student'); ?>">
                Home
            </a>

            <a href="<?= site_url('student/profile'); ?>">
                Student Profile
            </a>

        </div>

    </nav>


    <div class="main-container">

        <div class="profile-card">

            <div class="profile-header">

                <div class="profile-icon">
                    👤
                </div>

                <h1>Student Information</h1>

                <p>
                    Personal and academic student profile
                </p>

            </div>


            <div class="profile-body">

                <div class="info-grid">

                    <div class="info-item">

                        <span class="label">
                            Student ID
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student['student_id']); ?>
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="label">
                            Name
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student['name']); ?>
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="label">
                            Course
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student['course']); ?>
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="label">
                            Year Level
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student['year']); ?>
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="label">
                            Section
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student['section']); ?>
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="label">
                            Email
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student['email']); ?>
                        </span>

                    </div>


                    <div class="info-item full-width">

                        <span class="label">
                            Skills
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student['skills']); ?>
                        </span>

                    </div>


                    <div class="info-item full-width">

                        <span class="label">
                            Hobbies
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student['hobbies']); ?>
                        </span>

                    </div>

                </div>


                <a
                    href="<?= site_url('student'); ?>"
                    class="back-button"
                >
                    ← Back to Home
                </a>

            </div>

        </div>

    </div>

</body>
</html>