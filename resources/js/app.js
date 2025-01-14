import './bootstrap';

// On page load or when changing themes, apply the correct theme
function applyTheme(theme) {
  if (theme === 'dark') {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }
}

// Initial check and apply the theme based on saved preference or system preference
(function () {
  const savedTheme = localStorage.getItem('theme');
  const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)').matches;

  if (savedTheme === 'dark' || (!savedTheme && prefersDarkScheme)) {
    applyTheme('dark');
  } else {
    applyTheme('light');
  }
})();

// Toggle theme between dark and light
document.getElementById('dark-mode-toggle').addEventListener('click', function () {
  const currentTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
  const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
  updateTheme(newTheme);
});

function updateTheme(theme) {
  localStorage.setItem('theme', theme);
  applyTheme(theme);
}


document.getElementById('dropdown-button').addEventListener('click', function () {
  const dropdown = document.getElementById('dropdown');
  dropdown.classList.toggle('hidden');
});

// Close the dropdown if clicked outside of it
window.addEventListener('click', function (event) {
  if (!event.target.closest('#dropdown') && !event.target.closest('#dropdown-button')) {
      document.getElementById('dropdown').classList.add('hidden');
  }
});

// Update button text on category selection
const dropdownItems = document.querySelectorAll('#dropdown button');
const dropdownButton = document.getElementById('dropdown-button');
const svgIcon = `<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                 </svg>`;

dropdownItems.forEach(item => {
  item.addEventListener('click', function () {
      dropdownButton.innerHTML = `${this.innerText} ${svgIcon}`;
      dropdownButton.classList.remove('focus:ring', 'focus:outline-none', 'focus:ring-gray-100');
      document.getElementById('dropdown').classList.add('hidden');
  });
});