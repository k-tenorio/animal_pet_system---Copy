<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawMily Home</title>
    <link rel="icon" type="image/png" href="{{ asset('images/PawMily_Home_Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/PawMily_Home_Logo.png') }}" alt="PawMily Home Logo">
            <div class="logo-text">
                <h2>PawMily Home</h1>
                    <p>Where Every Paw Finds a Family</p>
            </div>
        </div>

        <ul class="nav-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#adopt">Adopt</a></li>
            <li><a href="#donation">Donate</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <div>
                <a href="/login" class="login-btn">Log In</a>
                <a href="/register" class="register-btn">Register</a>
            </div>

        </ul>
    </nav>

    <!-- Hero -->
    <section class="hero" id="hero">
        <div class="hero-text">
            <h1>Adopt a Pet,<br> Change a Life</h1>
            <p>
                Every pet deserves a loving home. By adopting, <br>
                you're not just giving a pet a second chance, you're gaining <br>
                a loyal friend and making a difference in the world.
            </p>
            <div class="hero-buttons">
                <a href="{{ route('login') }}" class="btn-primary">Browse Pets</a>
                <a href="#" class="btn-secondary">Learn More</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/Hero_img.png') }}" alt="Dog and Cat" />
        </div>
    </section>

    <!-- About Us -->
    <section class="about-us" id="about">
        <div class="about-image">
            <img src="{{ asset('images/about-us.jpg') }}" alt="About PawMily Home">
        </div>
        <div class="about-text">
            <h3>ABOUT US</h3>
            <h2>Dedicated to Finding Every Paw a Family 🐾</h2>
            <p>
                At PawMily Home, we believe that every animal deserves a second chance. 
                Our mission is to rescue, rehabilitate, and rehome pets in need, connecting them 
                with loving families who will cherish them forever.
            </p>
            <p>
                Whether you're looking to adopt a new best friend, make a donation, or just spread 
                the word, you can make a huge impact. Together, we can create a world where no 
                pet is left behind.
            </p>
        </div>
    </section>

    <!-- PETS -->
    <section class="pets" id="adopt">
        <div class="pets-header">
            <div class="pets-title">
                <h3>MEET YOUR NEW BEST FRIEND</h3>
                <h1>Pets Looking for a Home</h1>
            </div>

            <a href="{{ route('login') }}" class="view-btn">View All Pets</a>
        </div>

        <div class="pet-container">
            <div class="pet-card">
                <span class="tag">Puppy</span>
                <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=1000&auto=format&fit=crop">
                <div class="pet-info">
                    <h3>Bruno</h3>
                    <p>Male • 6 months • Mixed Breed</p>
                </div>
            </div>

            <div class="pet-card">
                <span class="tag">Kitten</span>
                <img src="https://images.unsplash.com/photo-1519052537078-e6302a4968d4?q=80&w=1000&auto=format&fit=crop">
                <div class="pet-info">
                    <h3>Luna</h3>
                    <p>Female • 4 months • Tabby</p>
                </div>
            </div>

            <div class="pet-card">
                <span class="tag">Adult</span>
                <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?q=80&w=1000&auto=format&fit=crop">
                <div class="pet-info">
                    <h3>Max</h3>
                    <p>Male • 2 years • Border Collie</p>
                </div>
            </div>
        </div>
    </section>

    <!-- DONATION SECTION -->
    <section class="donation" id="donation">
        <div class="donation-container">
            <div class="donation-card">
                <h1>Make a Donation</h1>
                <p>Your donation helps animals find a loving home.</p>

                @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('donation.store') }}" method="POST">
                    @csrf

                    <label>Donor Name</label>
                    <input type="text" name="donor_name" value="{{ old('donor_name') }}" required>

                    <label>Email</label>
                    <input type="email" name="donor_email" value="{{ old('donor_email') }}" required>

                    <label>Contact Number</label>
                    <input type="text" name="donor_contact_number" value="{{ old('donor_contact_number') }}" required>

                    <label>Amount</label>
                    <input type="number" name="amount" step="0.01" value="{{ old('amount') }}" required>

                    <label>Payment Method</label>
                    <select name="payment_method" required>
                        <option value="">Select Payment Method</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="GCash">GCash</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                    </select>

                    <button type="submit">Donate Now</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container">

            <div class="footer-about">
                <div class="footer-logo">
                    <img src="{{ asset('images/PawMily_Home_Logo.png') }}" alt="PawMily Home Logo">
                    <div>
                        <h2>PawMily Home</h2>
                        <p>Where Every Paw Finds a Family</p>
                    </div>
                </div>

                <p class="footer-desc">
                    We are dedicated to rescuing pets and finding them loving forever homes.
                </p>

                <div class="social-icons">
                    <a href=""><img src="{{ asset('images/facebook.png') }}" alt="Facebook"></a>
                    <a href=""><img src="{{ asset('images/twitter.png') }}" alt="Twitter"></a>
                    <a href=""><img src="{{ asset('images/instagram.png') }}" alt="Instagram"></a>
                    <a href=""><img src="{{ asset('images/youtube.png') }}" alt="YouTube"></a>
                </div>
            </div>

            <div class="footer-links">
                <h3>Quick Links</h3>
                <a href="#hero">Home</a>
                <a href="#about">About Us</a>
                <a href="#adopt">Adopt a Pet</a>
                <a href="#contact">Contact Us</a>
                <a href="#donation">Donate</a>
            </div>

            <div class="footer-contact" id="contact">
                <h3>Contact Us</h3>
                <p>📍 Test</p>
                <p>📞 (123) 456-7890</p>
                <p>✉ test@gmail.com</p>
                <p>🕘 Mon - Sat: 9:00 AM - 6:00 PM</p>
            </div>

        </div>

        <p class="copyright">
            © 2026 PawMily Home. All rights reserved.
        </p>
    </footer>

</body>

</html>