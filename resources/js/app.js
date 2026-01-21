import './bootstrap';

//FOOD FILTER
document.addEventListener('DOMContentLoaded', () => {
    const foodSelect = document.getElementById('food_type');
    const foodList = document.getElementById('food-list');

    if (!foodSelect || !foodList) return;

    foodSelect.addEventListener('change', () => {
        const selectedType = foodSelect.value;

        fetch(`/foods/filter?food_type=${selectedType}`)
            .then(response => response.json())
            .then(data => {
                foodList.innerHTML = '';

                if (data.length === 0) {
                    foodList.innerHTML = '<div class="food-item">Žiadne jedlá</div>';
                    return;
                }

                data.forEach(food => {
                    const div = document.createElement('div');
                    div.classList.add('food-item');
                    div.textContent = food.name;
                    foodList.appendChild(div);
                });
            })
            .catch(error => {
                console.error('Chyba pri načítaní jedál:', error);
                foodList.innerHTML = '<div class="food-item text-danger">Nepodarilo sa načítať jedlá</div>';
            });
    });
});

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
