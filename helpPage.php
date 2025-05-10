<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4; animation: fadeIn 1s ease-out;">
    <header style="background-color: #3498db; color: white; text-align: center; padding: 1rem; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h1 style="margin: 0; animation: slideIn 0.5s ease-out;">Help Center</h1>
    </header>

    <nav style="background-color: #2980b9; padding: 0.5rem; text-align: center;">
        <a href="#" style="color: white; text-decoration: none; margin: 0 10px; transition: color 0.3s ease;">Home</a>
        <a href="#" style="color: white; text-decoration: none; margin: 0 10px; transition: color 0.3s ease;">FAQs</a>
        <a href="#" style="color: white; text-decoration: none; margin: 0 10px; transition: color 0.3s ease;">Contact</a>
    </nav>

    <main style="max-width: 800px; margin: 2rem auto; padding: 0 1rem;">
        <section style="background-color: white; border-radius: 5px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 2px 5px rgba(0,0,0,0.1); animation: slideIn 0.5s ease-out;">
            <h2 style="color: #3498db;">Frequently Asked Questions</h2>
            <details style="margin-bottom: 1rem; transition: all 0.3s ease;">
                <summary style="cursor: pointer; padding: 0.5rem; background-color: #ecf0f1; border-radius: 3px;">How do I reset my password?</summary>
                <p style="padding: 0.5rem; animation: fadeIn 0.5s ease-out;">To reset your password, click on the "Forgot Password" link on the login page and follow the instructions sent to your email.</p>
            </details>
            <details style="margin-bottom: 1rem; transition: all 0.3s ease;">
                <summary style="cursor: pointer; padding: 0.5rem; background-color: #ecf0f1; border-radius: 3px;">How can I update my profile information?</summary>
                <p style="padding: 0.5rem; animation: fadeIn 0.5s ease-out;">Log in to your account, go to the "Profile" section, and click on the "Edit" button to update your information.</p>
            </details>
            <details style="margin-bottom: 1rem; transition: all 0.3s ease;">
                <summary style="cursor: pointer; padding: 0.5rem; background-color: #ecf0f1; border-radius: 3px;">What payment methods do you accept?</summary>
                <p style="padding: 0.5rem; animation: fadeIn 0.5s ease-out;">We accept major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers for payments.</p>
            </details>
            <details style="margin-bottom: 1rem; transition: all 0.3s ease;">
                <summary style="cursor: pointer; padding: 0.5rem; background-color: #ecf0f1; border-radius: 3px;">How can I track my order?</summary>
                <p style="padding: 0.5rem; animation: fadeIn 0.5s ease-out;">You can track your order by logging into your account and visiting the "Order History" section. There, you'll find tracking information for all your recent orders.</p>
            </details>
            <details style="margin-bottom: 1rem; transition: all 0.3s ease;">
                <summary style="cursor: pointer; padding: 0.5rem; background-color: #ecf0f1; border-radius: 3px;">What is your return policy?</summary>
                <p style="padding: 0.5rem; animation: fadeIn 0.5s ease-out;">We offer a 30-day return policy for most items. Products must be in their original condition and packaging. Please refer to our Returns page for more detailed information.</p>
            </details>
            <details style="margin-bottom: 1rem; transition: all 0.3s ease;">
                <summary style="cursor: pointer; padding: 0.5rem; background-color: #ecf0f1; border-radius: 3px;">How can I cancel my subscription?</summary>
                <p style="padding: 0.5rem; animation: fadeIn 0.5s ease-out;">To cancel your subscription, log in to your account, go to the "Subscriptions" section, and click on the "Cancel Subscription" button. Follow the prompts to complete the cancellation process.</p>
            </details>
            <details style="margin-bottom: 1rem; transition: all 0.3s ease;">
                <summary style="cursor: pointer; padding: 0.5rem; background-color: #ecf0f1; border-radius: 3px;">Do you offer international shipping?</summary>
                <p style="padding: 0.5rem; animation: fadeIn 0.5s ease-out;">Yes, we offer international shipping to most countries. Shipping rates and delivery times vary depending on the destination. You can see the available shipping options during the checkout process.</p>
            </details>
            <details style="margin-bottom: 1rem; transition: all 0.3s ease;">
                <summary style="cursor: pointer; padding: 0.5rem; background-color: #ecf0f1; border-radius: 3px;">How can I contact customer support?</summary>
                <p style="padding: 0.5rem; animation: fadeIn 0.5s ease-out;">You can contact our customer support team through email at support@example.com, by phone at 1-800-123-4567, or by using the live chat feature on our website during business hours.</p>
            </details>
        </section>
    </main>

    <footer style="background-color: #34495e; color: white; text-align: center; padding: 1rem; position: relative; bottom: 0; width: 100%;">
        <p style="margin: 0;">&copy; 2023 Help Center. All rights reserved.</p>
    </footer>

    <script>
        document.querySelectorAll('details').forEach(detail => {
            detail.addEventListener('toggle', () => {
                if (detail.open) {
                    detail.style.backgroundColor = '#e8f6ff';
                } else {
                    detail.style.backgroundColor = 'transparent';
                }
            });
        });
    </script>
</body>
</html>