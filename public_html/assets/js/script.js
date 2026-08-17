document.addEventListener('DOMContentLoaded', () => {
  const langSwitch = document.querySelector('.lang-switch');
  if (langSwitch) {
    document.addEventListener('click', (e) => {
      if (langSwitch.open && !langSwitch.contains(e.target)) {
        langSwitch.open = false;
      }
    });
  }
});
