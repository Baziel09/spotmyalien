<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedankt voor je steun! - UFO Meldpunt</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 50%, #2d1b69 100%);
            color: #ffffff;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }

        /* Sterren animatie */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        /* UFO animatie */
        .ufo {
            position: absolute;
            top: 20%;
            left: -150px;
            width: 120px;
            height: 60px;
            animation: flyAcross 15s infinite linear;
            z-index: 2;
        }

        .ufo-body {
            width: 120px;
            height: 40px;
            background: linear-gradient(45deg, #4a90e2, #7b68ee);
            border-radius: 50%;
            position: relative;
            box-shadow: 0 0 30px rgba(123, 104, 238, 0.6);
        }

        .ufo-dome {
            width: 60px;
            height: 30px;
            background: linear-gradient(45deg, rgba(255,255,255,0.3), rgba(255,255,255,0.1));
            border-radius: 50% 50% 50% 50% / 100% 100% 0% 0%;
            position: absolute;
            top: -15px;
            left: 30px;
        }

        .ufo-lights {
            position: absolute;
            bottom: -5px;
            left: 20px;
            right: 20px;
            height: 10px;
        }

        .ufo-light {
            width: 8px;
            height: 8px;
            background: #00ff88;
            border-radius: 50%;
            position: absolute;
            animation: blink 1s infinite alternate;
        }

        .ufo-light:nth-child(1) { left: 0; }
        .ufo-light:nth-child(2) { left: 25px; animation-delay: 0.3s; }
        .ufo-light:nth-child(3) { left: 50px; animation-delay: 0.6s; }
        .ufo-light:nth-child(4) { right: 0; animation-delay: 0.9s; }

        @keyframes blink {
            0% { opacity: 0.3; }
            100% { opacity: 1; }
        }

        @keyframes flyAcross {
            0% { left: -150px; }
            100% { left: calc(100% + 150px); }
        }

        /* Main content */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
            text-align: center;
            position: relative;
            z-index: 3;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .alien-head {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            margin-top: 30px;
            position: relative;
            animation: float 4s ease-in-out infinite;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alien-head img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 0 20px rgba(74, 222, 128, 0.4));
        }

        @keyframes blink-eye {
            0%, 90%, 100% { transform: scaleY(1); }
            95% { transform: scaleY(0.1); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .thank-you-text {
            margin: 30px 0;
        }

        .main-title {
            font-size: 3.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #00ff88, #00ccff, #ff6b6b);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 3s ease-in-out infinite;
            margin-bottom: 20px;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .subtitle {
            font-size: 1.5rem;
            color: #b8c5d6;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .message {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #e2e8f0;
            margin-bottom: 40px;
            animation: fadeInUp 1s ease-out 1s both;
        }

        .back-button {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(45deg, #4a90e2, #7b68ee);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(123, 104, 238, 0.3);
            animation: fadeInUp 1s ease-out 1.5s both;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(123, 104, 238, 0.5);
            background: linear-gradient(45deg, #5a9ff2, #8b78fe);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Shooting stars */
        .shooting-star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: linear-gradient(45deg, transparent, #fff, transparent);
            border-radius: 50%;
            animation: shoot 8s infinite linear;
        }

        .shooting-star:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 2s;
        }

        .shooting-star:nth-child(2) {
            top: 60%;
            left: 80%;
            animation-delay: 5s;
        }

        @keyframes shoot {
            0% {
                transform: rotate(45deg) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: rotate(45deg) translateX(300px);
                opacity: 0;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-title {
                font-size: 2.5rem;
            }
            
            .subtitle {
                font-size: 1.2rem;
            }
            
            .container {
                padding: 20px 15px;
            }
        }

        /* Glow effect */
        .glow {
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 10px hsl(152, 72.50%, 64.30%, 0.50), 0 0 20px hsla(152, 72.50%, 64.30%, 0.70), 0 0 30px hsl(152, 72.50%, 64.30%, 0.50);
            }
            to {
                text-shadow: 0 0 20px hsl(152, 72.50%, 64.30%, 0.50), 0 0 30px hsl(152, 72.50%, 64.30%, 0.70), 0 0 40px hsl(152, 72.50%, 64.30%, 0.50);
            }
        }
    </style>
</head>
<body>
    <!-- Sterren achtergrond -->
    <div class="stars" id="stars"></div>
    
    <!-- UFO animatie -->
    <div class="ufo">
        <div class="ufo-body">
            <div class="ufo-dome"></div>
            <div class="ufo-lights">
                <div class="ufo-light"></div>
                <div class="ufo-light"></div>
                <div class="ufo-light"></div>
                <div class="ufo-light"></div>
            </div>
        </div>
    </div>

    <!-- Vallende sterren -->
    <div class="shooting-star"></div>
    <div class="shooting-star"></div>

    <!-- Main content -->
    <div class="container">
        <div class="alien-head">
            <img src="{{ asset('images/alien-space.svg') }}" alt="Alien Head">
        </div>

        <div class="thank-you-text">
            <h1 class="main-title glow">BEDANKT!</h1>
            <h2 class="subtitle">Je donatie is succesvol ontvangen</h2>
            <p class="message">
                Dankzij jouw steun kunnen we blijven onderzoeken en documenteren van UFO-waarnemingen. 
                Samen brengen we de waarheid over buitenaardse verschijnselen aan het licht! 
                Je bijdrage helpt ons om ons onderzoek voort te zetten en meer mensen te bereiken.
                <br><br>
                🛸 De waarheid is daarbuiten... en jij helpt ons deze te vinden! 👽
            </p>
            <a href="/" class="back-button">Terug naar UFO Meldpunt</a>
        </div>
    </div>

    <script>
        // Genereer sterren
        function createStars() {
            const starsContainer = document.getElementById('stars');
            const numberOfStars = 100;

            for (let i = 0; i < numberOfStars; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.left = Math.random() * 100 + '%';
                star.style.top = Math.random() * 100 + '%';
                star.style.animationDelay = Math.random() * 3 + 's';
                starsContainer.appendChild(star);
            }
        }

        // Voeg interactieve elementen toe
        function addInteractivity() {
            const alienHead = document.querySelector('.alien-head');
            
            alienHead.addEventListener('click', function() {
                this.style.animation = 'none';
                this.offsetHeight; // Trigger reflow
                this.style.animation = 'float 1s ease-in-out';
                
                // Voeg een tijdelijke glow toe
                this.style.filter = 'drop-shadow(0 0 20px #4ade80)';
                setTimeout(() => {
                    this.style.filter = '';
                    this.style.animation = 'float 4s ease-in-out infinite';
                }, 1000);
            });
        }

        // Initialiseer alles wanneer pagina is geladen
        document.addEventListener('DOMContentLoaded', function() {
            createStars();
            addInteractivity();
        });
    </script>
</body>
</html>