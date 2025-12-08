import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registerForm');
    if (!form) return;

    form.addEventListener('submit', function (event) {
        const errors = [];

        const email = form.elements['email']?.value.trim() ?? '';
        const name = form.elements['name']?.value.trim() ?? '';
        const password = form.elements['password']?.value.trim() ?? '';
        const passwordConfirm = form.elements['password_confirmation']?.value.trim() ?? '';

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errors.push('Neplatný email.');
        }
        if (password.length < 8) {
            errors.push('Heslo musí mať aspoň 8 znakov.');
        }

        if (password !== passwordConfirm) {
            errors.push('Heslá sa nezhodujú.');
        }

        if (errors.length > 0) {
            event.preventDefault();

            let errorDiv = form.querySelector('.errors');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.classList.add('errors');
                form.appendChild(errorDiv);
            }

            errorDiv.innerHTML = '<ul>' + errors.map(e => `<li>${e}</li>`).join('') + '</ul>';
            errorDiv.scrollIntoView({ behavior: 'smooth' });
        }
    });
});
