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
const feedbackForm = document.getElementById('feedbackForm');
const contactsForm = document.getElementById('contactsForm');
const serviceNameInput = document.getElementById('serviceName');
const phoneInputs = document.querySelectorAll('.form-phone');

// Открытие модального окна
document.querySelectorAll('.service-card__button').forEach(button => {
    button.addEventListener('click', () => {
        const modalTitle = document.querySelector('.modal__title');
        modalTitle.textContent = `Заказать услугу`;
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

document.querySelectorAll('.equipment-card__order-btn').forEach(button => {
    button.addEventListener('click', () => {
        const equipmentName = button.dataset.equipment;
        const modalTitle = document.querySelector('.modal__title');
        modalTitle.textContent = `Заказать манипулятор ${equipmentName}`;
        const serviceName = `Заказ конретной модели манипулятора: ${equipmentName} `;
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

if (phoneInputs) {
    phoneInputs.forEach(input => {
        input.addEventListener('input', () => maskPhone(input));
        input.addEventListener('focus', () => maskPhone(input));
        input.addEventListener('blur', () => {
            if (input.value.length < 18) {
                input.value = '';  
            }
        });
    });
}

// --- Функции для санитации и отправки данных в Telegram ---
function sanitizeInput(input) {
    if (typeof input !== 'string') return '';
    return input
        .trim()
        .replace(/[<>]/g, '') // Удаляем < и >
        .replace(/[\u0000-\u001F\u007F-\u009F]/g, '') // Удаляем управляющие символы
        .replace(/&/g, '&amp;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#x27;')
        .replace(/\//g, '&#x2F;');
}

function sanitizePhone(phone) {
    if (typeof phone !== 'string') return '';
    // Оставляем только цифры и плюс
    let cleaned = phone.replace(/[^0-9+]/g, '');
    // Если есть несколько плюсов, оставляем только первый
    if (cleaned.startsWith('+')) {
        cleaned = '+' + cleaned.slice(1).replace(/\+/g, '');
    } else {
        cleaned = cleaned.replace(/\+/g, '');
    }
    return cleaned;
}

function sendDataToTelegram(message) {
    const botToken = "7311009873:AAEzy-c1HrbXlvmcOJxCnDeyUZN0ApIzypE";
    const chatId = "-4914480902";
    const apiUrl = `https://api.telegram.org/bot${botToken}/sendMessage`;
    const params = {
        chat_id: chatId,
        text: message,
        parse_mode: 'HTML'
    };
    return fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(params)
    }).then(response => response.json());
}

async function handleFormData(data, form) {
    // Санитация данных
    const sanitizedData = {
      service: sanitizeInput(data.service),
      name: sanitizeInput(data.name),
      phone: sanitizePhone(data.phone),
      message: sanitizeInput(data.message)
  };

  const message = `\n📩 Новая заявка с сайта:\n<b>Услуга:</b> ${sanitizedData.service}\n<b>Имя:</b> ${sanitizedData.name}\n<b>Телефон:</b> ${sanitizedData.phone}\n<b>Сообщение:</b> ${sanitizedData.message}`;
  console.log('message', message);

  try {
      const result = await sendDataToTelegram(message);
      console.log('result', result);
      if (result.ok) {
          alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
          closeModal();
          form.reset();
      } else {
          alert('Ошибка при отправке сообщения. Пожалуйста, попробуйте ещё раз.');
      }
  } catch (error) {
      console.error('Ошибка при отправке формы:', error);
      alert('Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.');
  }
}

// --- Обработчик отправки формы ---
orderForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(orderForm);
    const data = Object.fromEntries(formData.entries());
    
    await handleFormData(data, orderForm);
});


if(feedbackForm) {
    feedbackForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(feedbackForm);
        const data = Object.fromEntries(formData.entries());

        await handleFormData(data, feedbackForm);
    });
}

// --- Контакты: форма обратной связи ---

if(contactsForm) {
    contactsForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(contactsForm);
        const data = Object.fromEntries(formData.entries());
        
        await handleFormData(data, contactsForm);
    });
}

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

//service.js
(function() {
  // FAQ-аккордеон: только один открыт, плавное открытие, поддержка Tab
  const faqItems = document.querySelectorAll('.faq__item');
  faqItems.forEach(item => {
      const question = item.querySelector('.faq__question');
      question.addEventListener('click', () => {
          // Закрыть все
          faqItems.forEach(i => {
              if (i !== item) i.classList.remove('active');
          });
          // Открыть/закрыть текущий
          item.classList.toggle('active');
      });
      // Поддержка Tab/Enter
      question.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              question.click();
          }
      });
  });
  
  // Маска телефона для формы обратной связи на странице услуги
  const phoneService = document.getElementById('phoneService');
  if (phoneService) {
      phoneService.addEventListener('input', () => maskPhone(phoneService));
      phoneService.addEventListener('focus', () => maskPhone(phoneService));
      phoneService.addEventListener('blur', () => {
          if (phoneService.value.length < 18) phoneService.value = '';
      });
  }
  
  // Открытие модального окна по кнопке в hero
  const modal = document.getElementById('orderModal');
  const modalOverlay = modal.querySelector('.modal__overlay');
  const modalClose = modal.querySelector('.modal__close');
  const orderForm = document.getElementById('orderForm');
  const serviceNameInput = document.getElementById('serviceName');
  
  document.querySelectorAll('.service-hero__order-btn, .service-card__button').forEach(btn => {
      btn.addEventListener('click', () => {
          const service = btn.dataset.service || 'Перевозка газосиликатных блоков';
          serviceNameInput.value = service;
          modal.classList.add('active');
          document.body.style.overflow = 'hidden';
      });
  });
  modalClose.addEventListener('click', closeModal);
  modalOverlay.addEventListener('click', closeModal);
  function closeModal() {
      modal.classList.remove('active');
      document.body.style.overflow = '';
      orderForm.reset();
  }
  document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal.classList.contains('active')) closeModal();
  });
  
  // Маска телефона для модального окна
  const phoneInput = document.getElementById('phone');
  if (phoneInput) {
      phoneInput.addEventListener('input', () => maskPhone(phoneInput));
      phoneInput.addEventListener('focus', () => maskPhone(phoneInput));
      phoneInput.addEventListener('blur', () => {
          if (phoneInput.value.length < 18) phoneInput.value = '';
      });
  }
  
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
  
  // Отправка формы обратной связи (имитация)
  const feedbackFormService = document.getElementById('feedbackFormService');
  if (feedbackFormService) {
      feedbackFormService.addEventListener('submit', function(e) {
          e.preventDefault();
          alert('Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.');
          feedbackFormService.reset();
      });
  }
  // Отправка формы заказа (имитация)
  if (orderForm) {
      orderForm.addEventListener('submit', function(e) {
          e.preventDefault();
          alert('Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.');
          closeModal();
      });
  }
  // Fancybox инициализация (автоматически по data-fancybox)
  })(); 

