document.addEventListener('DOMContentLoaded', function () {
  function setMessage(form, type, message) {
    const success = form.querySelector('[id$="success-message"], #form-success-message');
    const error = form.querySelector('[id$="error-message"], #form-error-message');
    const target = type === 'success' ? success : error;
    const other = type === 'success' ? error : success;

    if (other) other.style.setProperty('display', 'none', 'important');
    if (target) {
      if (message) target.textContent = message;
      target.style.setProperty('display', 'block', 'important');
    }
  }

  function submitForm(form) {
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
      headers: { Accept: 'application/json' }
    })
      .then(async function (response) {
        const result = await response.json().catch(function () { return {}; });
        if (!response.ok || (result.status && result.status !== 'success')) {
          throw new Error(result.message || 'Something went wrong while submitting the form.');
        }
        setMessage(form, 'success', result.message);
        form.reset();
      })
      .catch(function (error) {
        console.error('Form submission error:', error);
        setMessage(form, 'error', error.message);
      });
  }

  document.querySelectorAll('form[action$="submit-form.php"], form[action$="submit-contact.php"]').forEach(function (form) {
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      submitForm(form);
    });
  });

});
