// Remove the "Get Elementor Pro" link in the plugins list from the Elementor plugin item.
window.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelector('.plugins-php [data-plugin="elementor/elementor.php"] .row-actions > span.go_pro');
    if (!elements) return;
    elements.previousElementSibling.innerHTML = elements.previousSibling.innerHTML.replace('|', '');
    elements.remove('go_pro');
});
