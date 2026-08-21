<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Home</title>

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

        /* Navigation Bar */
        nav {
            background: #1e3a8a;
            padding: 18px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        /* Main Section */
        .main-container {
            min-height: calc(100vh - 75px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card {
            background: white;
            width: 100%;
            max-width: 750px;
            padding: 50px;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .icon {
            width: 75px;
            height: 75px;
            background: #dbeafe;
            color: #1e3a8a;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 25px;
            font-size: 32px;
            font-weight: bold;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 15px;
            color: #1e3a8a;
        }

        .description {
            color: #6b7280;
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .profile-button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 13px 26px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .profile-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .info-section {
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: center;
            gap: 40px;
        }

        .info-box h3 {
            color: #1e3a8a;
            margin-bottom: 5px;
        }

        .info-box p {
            color: #6b7280;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                gap: 15px;
            }

            .card {
                padding: 35px 20px;
            }

            h1 {
                font-size: 26px;
            }

            .info-section {
                flex-direction: column;
                gap: 20px;
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
            <a href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>">Student Profile</a>
        </div>
    </nav>


    <div class="main-container">

        <div class="card">

            <div class="icon">
                🎓
            </div>

            <h1>Welcome to the Student Portal</h1>

            <p class="description">
                Welcome to the Student Information System.
                View your student details, academic information,
                skills, and other profile information through the
                Student Profile page.
            </p>

            <a
                href="<?= site_url('student/profile'); ?>"
                class="profile-button"
            >
                View Student Profile
            </a>


            <div class="info-section">

                <div class="info-box">
                    <h3>Student Information</h3>
                    <p>View personal and academic details</p>
                </div>

                <div class="info-box">
                    <h3>Protected Profile</h3>
                    <p>Access controlled using middleware</p>
                </div>

            </div>

        </div>

    </div>

</body>
</html>