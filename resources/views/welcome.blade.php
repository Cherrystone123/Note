<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mizukaze Note</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .typewriter {
          overflow: hidden; /* Ensures the content is not revealed until the animation */
          border-right: .15em solid orange; /* The typwriter cursor */
          white-space: nowrap; /* Keeps the content on a single line */
          letter-spacing: .15em; /* Adjust as needed */
          animation: 
            blink-caret .75s step-end infinite;
        }

        /* The typing effect */
        @keyframes typing {
          from { width: 0 }
          to { width: 100% }
        }

        /* The typewriter cursor effect */
        @keyframes blink-caret {
          from, to { border-color: transparent }
          50% { border-color: orange; }
        }
    </style>
</head>
<body>
    <header class="flex justify-between text-xl border-b-2 border-black-300 md:text-xl p-5">
        <h1 class="typewriter">
            Mizukaze Note
        </h1>
        <section>
            @if (Route::has('login'))
                <div class="grid grid-cols-2 gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </section>
    </header>
    <section style="background-image: linear-gradient(45deg,#082843,#ff748c,#9799ba);" class="p-10">
        <section style="box-shadow: 0px 0px 10px white; background-color: rgba(255, 255, 255, 0.5);" class="rounded-xl p-10">
            <h3 class="text-5xl md:text-3xl">Welcome to Personal Note Web</h3><br>
            <h3 class="text-3xl md:text-xl">Introduction</h3>

            <p>Welcome to Personal Note Web, your digital space for taking, organizing, and managing your personal notes. Whether you're a student, professional, or just someone who likes to keep things organized, this web application is designed to make your note-taking experience effortless and efficient.</p><br>
            <h3 class="text-3xl md:text-xl">Key Features</h3>
            <h3 class="text-3xl md:text-xl">1. User-Friendly Interface</h3>

            <p>Our intuitive and user-friendly interface ensures that you can start taking notes right away. The clean and clutter-free design allows you to focus on your notes without distractions.</p><br>
            <h3 class="text-3xl md:text-xl">2. Create and Edit Notes</h3>

            <p>Easily create new notes and edit existing ones. The built-in rich text editor supports formatting, including bold, italics, lists, and more, to make your notes clear and organized.</p><br>
            <h3 class="text-3xl md:text-xl">3. Organize Your Notes</h3>

            <p>Use tags, categories, and folders to organize your notes. Quickly find what you need by sorting and searching through your collection.</p><br>
            <h3 class="text-3xl md:text-xl">4. Secure Your Notes</h3>

            <p>Your privacy is important. Personal Note Web provides robust security features, including encrypted storage and optional two-factor authentication, to keep your notes safe.</p><br>
            <h3 class="text-3xl md:text-xl">5. Access Anywhere</h3>

            <p>Access your notes from any device with an internet connection. Our web app is responsive, ensuring a seamless experience on desktop, tablet, and mobile.</p><br>
            <h3 class="text-3xl md:text-xl">Getting Started</h3>
            <h3 class="text-3xl md:text-xl">1. Sign Up or Log In</h3>

            <p>To get started, sign up for a new account or log in with your existing credentials.</p><br>
            <h3 class="text-3xl md:text-xl">2. Create Your First Note</h3>

            <p>Once logged in, click the "Create Note" button to start taking notes. Give your note a title, add content, and use the formatting options to style your text.</p><br>
            <h3 class="text-3xl md:text-xl">3. Organize and Manage</h3>

            <p>Use tags, categories, and folders to organize your notes. You can also edit and delete notes as needed.</p><br>
            <h3 class="text-3xl md:text-xl">4. Explore Advanced Features</h3>

            <p>Dig deeper into Personal Note Web's advanced features like searching, sorting, and setting up two-factor authentication to enhance your note-taking experience.</p><br>
            <h3 class="text-3xl md:text-xl">Support and Feedback</h3>

            <p>We're here to help. If you have any questions, encounter issues, or want to provide feedback, please visit our Support page.</p><br>
            <h3 class="text-3xl md:text-xl">Ready to Get Started?</h3>

            <p>Start taking organized notes with Personal Note Web today. Sign Up now and experience the difference.</p><br>
        </section>
    </section>
</body>
</html>