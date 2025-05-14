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