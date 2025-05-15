// Modal and form functionality
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".modal");
    const closeButton = document.querySelector(".modal-close");
    const orderButtons = document.querySelectorAll(".order-button, .cta-button");
    const pavingStonesOrderButtons = document.querySelectorAll(
      ".paving-stones__button"
    );
    const priceButtons = document.querySelectorAll(".price-button");
    const inputType = document.querySelector("#orderForm__type");
    const orderForm = document.querySelector("#orderForm");
    const contactForm = document.querySelector(".contact-form.tg-form");
    const modalTitle = document.querySelector(".modal-content h2");  
  
    // Open modal with default title
    orderButtons.forEach((button) => {
      button.addEventListener("click", () => {
        modalTitle.textContent = "Заказать консультацию";
        inputType.value = "Заказ консультации";
        modal.classList.add("active");
        document.body.style.overflow = "hidden";
      });
    });
  
    // Open modal for price calculation
    priceButtons.forEach((button) => {
      button.addEventListener("click", () => {
        modalTitle.textContent = "Заказать расчет";
        inputType.value = "Заказ расчёта стоимости услуг";
        modal.classList.add("active");
        document.body.style.overflow = "hidden";
      });
    });
  
    pavingStonesOrderButtons.forEach((button) => {
      button.addEventListener("click", () => {
        modalTitle.textContent = "Заказать тротуарные плиты";
        inputType.value = "Заказ тротуарных плит";
        modal.classList.add("active");
        document.body.style.overflow = "hidden";
      });
    });
  
    // Close modal
    function closeModal() {
      modal.classList.remove("active");
      document.body.style.overflow = "";
    }
  
    closeButton.addEventListener("click", closeModal);
    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        closeModal();
      }
    });

    // Sanitize input data
    function sanitizeInput(input) {
      if (typeof input !== 'string') return '';
      return input
        .trim()
        .replace(/[<>]/g, '') // Remove < and > to prevent HTML injection
        .replace(/[\u0000-\u001F\u007F-\u009F]/g, '') // Remove control characters
        .replace(/&/g, '&amp;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#x27;')
        .replace(/\//g, '&#x2F;');
    }

    // Sanitize phone number
    function sanitizePhone(phone) {
      if (typeof phone !== 'string') return '';
      return phone.replace(/[^0-9+()-\s]/g, '').trim();
    }
  
    function sendDataToTelegram(message) {
      const botToken = "8039472973:AAF18WsQeN8iqEbSvEoajHRJ5c1tihAnZjM";
      const chatId = "-1002491249745";
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
  
    orderForm.addEventListener("submit", (e) => {
      e.preventDefault();
  
      // Get form data
      const formData = new FormData(orderForm);
      const data = Object.fromEntries(formData.entries());
  
      // Sanitize form data
      const sanitizedData = {
        type: sanitizeInput(data.type),
        personName: sanitizeInput(data.personName),
        personPhone: sanitizePhone(data.personPhone),
        personMessage: sanitizeInput(data.personMessage)
      };

      const message = `
          📩 Вам новая заявка:
          <b>Тип заявки:</b> ${sanitizedData.type}
          <b>Имя:</b> ${sanitizedData.personName}
          <b>Телефон:</b> ${sanitizedData.personPhone}
          <b>Сообщение:</b> ${sanitizedData.personMessage}
              `;
  
      // Send sanitized data to Telegram
      sendDataToTelegram(message)
          .then(result => {
            if (result.ok) {
                closeModal();
              alert("Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.");
            } else {
                closeModal();
              alert("Ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.");
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert("Произошла ошибка. Пожалуйста, попробуйте позже.");
          })
          .finally(() => {
            orderForm.reset();
            closeModal();
          });
    });
  
    contactForm.addEventListener("submit", (e) => {
        e.preventDefault();
      
        // Get form data from the correct form (contactForm)
        const formData = new FormData(contactForm);
        const data = Object.fromEntries(formData.entries());

        // Sanitize form data
        const sanitizedData = {
          personName: sanitizeInput(data.personName),
          personPhone: sanitizePhone(data.personPhone),
          personMessage: sanitizeInput(data.personMessage)
        };

        const message = `
          📩 Вам новая заявка:
          <b>Тип заявки:</b> Из контактной формы внизу страницы
          <b>Имя:</b> ${sanitizedData.personName}
          <b>Телефон:</b> ${sanitizedData.personPhone}
          <b>Сообщение:</b> ${sanitizedData.personMessage}
              `;
      
        // Send sanitized data to Telegram
        sendDataToTelegram(message)
          .then(result => {
            if (result.ok) {
                closeModal();
              alert("Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.");
            } else {
                closeModal();
              alert("Ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.");
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert("Произошла ошибка. Пожалуйста, попробуйте позже.");
          })
          .finally(() => {
            contactForm.reset();
          });
      });
  
    // Mobile menu functionality is now handled in navigation.js
  });