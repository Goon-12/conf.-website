# IEEE ICAAAA 2026 Conference Website

## File Structure

The monolithic `index.html` file has been split into separate, well-organized files:

### HTML Pages
- **home.html** - Conference home page with hero section, countdown timer, and welcome message
- **call-for-papers.html** - Call for papers page with important dates and submission tracks
- **registration.html** - Registration page with pricing tiers and registration forms
- **program.html** - Conference program and schedule
- **venue.html** - Venue information and accommodation details

### Shared Resources
- **styles.css** - External stylesheet containing:
  - Custom CSS variables for theme colors
  - Font imports (Space Grotesk, Material Symbols)
  - Custom animations
  - Dark mode utilities
  - Custom scrollbar styling

- **script.js** - External JavaScript file containing:
  - Tailwind CSS configuration
  - Countdown timer functionality
  - Mobile menu toggle
  - Dark mode toggle
  - Smooth scroll for anchor links

## Navigation Structure

All pages are now properly linked together through consistent navigation:

```
Home (home.html)
├── Call for Papers (call-for-papers.html)
├── Program (program.html)
├── Registration (registration.html)
└── Venue (venue.html)
```

## Features

### Countdown Timer
The home page includes an active countdown timer that counts down to the paper submission deadline (September 1, 2024). The timer updates in real-time showing days, hours, minutes, and seconds.

### Dark Mode Support
All pages support dark mode with a consistent color scheme:
- Primary: #2b6cee
- Background Light: #f6f6f8
- Background Dark: #101622

### Responsive Design
- Mobile-first responsive design using Tailwind CSS
- Optimized for all screen sizes
- Sticky navigation headers
- Mobile menu support

## Usage

1. Open any HTML file in a web browser to view the corresponding page
2. All pages are interlinked through the navigation menu
3. Ensure all files (HTML, CSS, JS) are in the same directory for proper linking

## Technologies Used

- **HTML5** - Semantic markup
- **Tailwind CSS** - Utility-first CSS framework (via CDN)
- **Vanilla JavaScript** - Interactive functionality
- **Google Fonts** - Space Grotesk typography
- **Material Symbols** - Icon library

## File Dependencies

Each HTML file requires:
- `styles.css` - Custom styles
- `script.js` - Interactive functionality
- Tailwind CSS (loaded via CDN)
- Google Fonts (loaded via CDN)

## Customization

To customize the theme colors, edit the CSS variables in `styles.css`:

```css
:root {
    --primary: #2b6cee;
    --background-light: #f6f6f8;
    --background-dark: #101622;
    --text-dark: #111318;
    --text-light: #ffffff;
}
```

To update the countdown timer target date, edit `script.js`:

```javascript
const targetDate = new Date('2024-09-01T23:59:59').getTime();
```

## Original File

The original monolithic file `index.html` (1703 lines) has been preserved and contains all 5 pages concatenated together. The new structure provides better maintainability and organization.
