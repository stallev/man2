document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuBtn = document.querySelector('.header__mobile-menu-btn');
    const nav = document.querySelector('.header__nav');
    const body = document.body;

    // Функция для переключения меню
    const toggleMenu = () => {
        mobileMenuBtn.classList.toggle('active');
        nav.classList.toggle('active');
        body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
    };

    // Обработчик клика по кнопке меню
    mobileMenuBtn.addEventListener('click', toggleMenu);

    // Закрытие меню при клике на ссылку
    const menuLinks = document.querySelectorAll('.header__menu-link');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (nav.classList.contains('active')) {
                toggleMenu();
            }
        });
    });

    // Закрытие меню при клике вне меню
    document.addEventListener('click', (e) => {
        if (nav.classList.contains('active') && 
            !nav.contains(e.target) && 
            !mobileMenuBtn.contains(e.target)) {
            toggleMenu();
        }
    });

    // Закрытие меню при изменении размера окна
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && nav.classList.contains('active')) {
            toggleMenu();
        }
    });
});

// Модальное окно
const modal = document.getElementById('orderModal');
const modalOverlay = modal.querySelector('.modal__overlay');
const modalClose = modal.querySelector('.modal__close');
const orderForm = document.getElementById('orderForm');
const serviceNameInput = document.getElementById('serviceName');
const phoneInput = document.getElementById('phone');

// Открытие модального окна
document.querySelectorAll('.service-card__button').forEach(button => {
    button.addEventListener('click', () => {
        const serviceName = button.dataset.service;
        serviceNameInput.value = serviceName;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

document.querySelectorAll('.header__order-btn').forEach(button => {
    button.addEventListener('click', () => {
        const serviceName = 'Заказать услугу';
        serviceNameInput.value = serviceName;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

document.querySelectorAll('.hero__button').forEach(button => {
    button.addEventListener('click', () => {
        const serviceName = 'Заказ манипулятора с первого экрана первой страницы';
        serviceNameInput.value = serviceName;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

// Закрытие модального окна
function closeModal() {
    modal.classList.remove('active');
    document.body.style.overflow = '';
    orderForm.reset();
}

modalClose.addEventListener('click', closeModal);
modalOverlay.addEventListener('click', closeModal);

// Закрытие по Escape
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
        closeModal();
    }
});

// Маска телефона
function maskPhone(input) {
    const matrix = '+375 (__) ___-__-__';
    const def = matrix.replace(/\D/g, '');
    let i = 0;
    let val = input.value.replace(/\D/g, '');

    if (def.length >= val.length) {
        val = def;
    }

    input.value = matrix.replace(/./g, function(a) {
        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? '' : a;
    });
}

phoneInput.addEventListener('input', () => maskPhone(phoneInput));
phoneInput.addEventListener('focus', () => maskPhone(phoneInput));
phoneInput.addEventListener('blur', () => {
    if (phoneInput.value.length < 18) {
        phoneInput.value = '';
    }
});

// Обработка отправки формы
orderForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(orderForm);
    const data = Object.fromEntries(formData.entries());

    try {
        // Здесь будет отправка данных на сервер
        console.log('Отправка данных:', data);
        
        // Имитация успешной отправки
        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
        closeModal();
    } catch (error) {
        console.error('Ошибка при отправке формы:', error);
        alert('Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.');
    }
});

// --- Контакты: форма обратной связи ---
(function() {
  const contactsForm = document.getElementById('contactsForm');
  const phoneInput = contactsForm ? contactsForm.querySelector('input[name="phone"]') : null;
  const messageBox = contactsForm ? document.getElementById('contactsFormMessage') : null;

  function maskPhone(input) {
    const matrix = '+375 (__) ___-__-__';
    const def = matrix.replace(/\D/g, '');
    let i = 0;
    let val = input.value.replace(/\D/g, '');
    if (def.length >= val.length) val = def;
    input.value = matrix.replace(/./g, function(a) {
      return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? '' : a;
    });
  }

  if (phoneInput) {
    phoneInput.addEventListener('input', () => maskPhone(phoneInput));
    phoneInput.addEventListener('focus', () => maskPhone(phoneInput));
    phoneInput.addEventListener('blur', () => {
      if (phoneInput.value.length < 18) phoneInput.value = '';
    });
  }

  if (contactsForm) {
    contactsForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const name = contactsForm.name.value.trim();
      const phone = contactsForm.phone.value.trim();
      const comment = contactsForm.comment.value.trim();
      const consent = contactsForm.consent.checked;
      messageBox.textContent = '';
      messageBox.style.color = 'var(--accent-color)';
      if (!name) {
        messageBox.textContent = 'Пожалуйста, введите имя.';
        contactsForm.name.focus();
        return;
      }
      if (!phone || phone.length < 18) {
        messageBox.textContent = 'Пожалуйста, введите корректный телефон.';
        contactsForm.phone.focus();
        return;
      }
      if (!consent) {
        messageBox.textContent = 'Необходимо согласие на обработку данных.';
        contactsForm.consent.focus();
        return;
      }
      // Имитация отправки (AJAX)
      contactsForm.querySelector('button[type="submit"]').disabled = true;
      setTimeout(() => {
        messageBox.textContent = 'Спасибо! Ваша заявка отправлена.';
        messageBox.style.color = 'var(--primary-color)';
        contactsForm.reset();
        contactsForm.querySelector('button[type="submit"]').disabled = false;
      }, 900);
    });
  }
})();

// Анимация появления при прокрутке
(function() {
  const animatedEls = document.querySelectorAll('.animated-fadeInUp, .animated-fadeIn, .breadcrumbs, .contacts-seo-text, .feedback, .contacts-form-section, .service-feedback');
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    animatedEls.forEach(el => observer.observe(el));
  } else {
    // Fallback: показать сразу
    animatedEls.forEach(el => el.classList.add('visible'));
  }
})();

// Анимация появления главной страницы при открытии
if (document.body.classList.contains('page-animate-in')) {
  window.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
      document.body.classList.remove('page-animate-in');
    }, 80);
  });
} 