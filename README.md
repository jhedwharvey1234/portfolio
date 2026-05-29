# PHP Resume Portfolio

A simple, functional resume portfolio built with PHP. This is a fully functional portfolio website that can be customized with your own information.

## Features

- **Responsive Design**: Works on desktop, tablet, and mobile devices
- **Multiple Pages**: Home, Projects, and Contact sections
- **Skills Display**: Visual skill progress bars
- **Experience Timeline**: List your professional experience
- **Education Section**: Display your educational background
- **Contact Form**: Functional contact form with validation
- **Modern Styling**: Professional CSS styling with animations
- **SEO Friendly**: Clean HTML structure

## File Structure

```
portfolio/
├── index.php              # Main home page with resume
├── projects.php           # Portfolio projects showcase
├── contact.php            # Contact form page
├── css/
│   └── style.css         # All styling
└── README.md             # This file
```

## Setup & Installation

1. **Copy files to XAMPP**:
   - Copy all files to `xampp/htdocs/portfolio/`

2. **Start XAMPP**:
   - Start Apache and MySQL services

3. **Access the portfolio**:
   - Open browser and go to: `http://localhost/portfolio/`

## Customization

### Edit Personal Information

**In `index.php`**:
- Update the "About Me" section
- Modify the `$skills` array with your skills and proficiency levels
- Update the `Experience` section with your work history
- Update the `Education` section with your educational background

**In `projects.php`**:
- Modify the `$projects` array to showcase your projects
- Update project titles, descriptions, and technologies used
- Add links to your actual project repositories or demos

**In `contact.php`**:
- Update contact information (email, phone, location, social media)
- Modify social media links
- Change the email address where contact form submissions are sent

### Styling Customization

Edit `css/style.css` to customize:
- **Colors**: Modify `:root` CSS variables:
  ```css
  --primary-color: #007bff;
  --secondary-color: #6c757d;
  --dark-color: #343a40;
  ```
- **Fonts**: Change `font-family` in the `body` selector
- **Layout**: Adjust `grid-template-columns` for responsive changes
- **Animations**: Modify `@keyframes` sections

## Sending Emails

The contact form currently displays a success message but doesn't send emails. To enable email functionality:

1. **Uncomment the mail function** in `contact.php`:
   ```php
   mail('your-email@example.com', $subject, $message, "From: $email");
   ```

2. **Configure PHP mail settings** in `php.ini`:
   - Set SMTP server
   - Set SMTP port
   - Configure sendmail path

3. **Or use a mail library** like PHPMailer or Swift Mailer for better reliability

## Features Explained

### Skills Section
- Displays skills with visual progress bars
- Edit the `$skills` array in `index.php`
- Percentage determines the progress bar width

### Projects Grid
- Responsive grid layout
- Cards expand on hover
- Edit the `$projects` array in `projects.php`

### Contact Form
- Client-side and server-side validation
- Prevents SQL injection with `htmlspecialchars()`
- Email validation with `filter_var()`
- Success/error messages using PHP sessions

## Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers

## Performance Tips

1. Optimize project images before uploading
2. Minify CSS for production
3. Use a CDN for faster loading
4. Enable gzip compression on your server

## Security Notes

- Contact form data is sanitized with `htmlspecialchars()`
- Email validation is performed
- Use proper database if you need to store submissions
- Never display raw user input without sanitization

## Future Enhancements

- Add database to store contact form submissions
- Implement admin panel for managing content
- Add blog section with categories
- Integrate with a CMS
- Add dark mode toggle
- Implement image gallery for projects
- Add testimonials section
- Implement search functionality

## License

Feel free to use this template for your personal portfolio.

## Support

For customization help or questions about PHP functionality, refer to:
- [PHP Documentation](https://www.php.net/manual/)
- [MDN Web Docs](https://developer.mozilla.org/)
- [XAMPP Documentation](https://www.apachefriends.org/)
