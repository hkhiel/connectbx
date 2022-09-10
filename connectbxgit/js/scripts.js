$(document).ready(function()
{
  /*Initialisation des éléments navbar responsive, select, modals, tooltip, datepicker et datepicker*/
  $('.button-collapse').sideNav();
  $('select').material_select();
  $('.modal').modal();
  $('.tooltipped').tooltip({delay: 50});
  $('.collapsible').collapsible();

});

const messages =
  {
    empty_fields:
      {
        text:
          {
            fr: "Veuillez remplir tous les champs",
            nl: "Vul alstublieft alle velden in"
          },
        type: "error"
      },
    unknown_error:
      {
        text:
          {
            fr: "Une erreur innatendue est survenue. Veuillez ressayer plus tard",
            nl: "Er is een onverwachte fout opgetreden. Probeer het later opnieuw"
          },
        type: "error"
      },
    message_added:
      {
        text:
          {
            fr: "Le message a été envoyé avec succès !",
            nl: "Het bericht is succesvol verzonden !"
          },
        type: "success"
      },
    invalid_email:
      {
        text:
          {
            fr: "L'adresse mail fournie n'est pas valide",
            nl: "Het opgegeven e-mailadres is niet geldig!"
          },
        type: "error"
      },
    success_email:
    {
      text:
        {
          fr: "Ton adresse mail a bien été enregistrée !",
          nl: "Uw e-mailadres is geregistreerd !"
        },
      type: "success"
    }
  };

function show_dialog(message,language)
{
  msg = "";
  if(language == 'nl')
    msg = message.text.nl;
  else
    msg = message.text.fr;
  switch (message.type)
  {
    case 'error':
      Materialize.toast(msg, 4000);
      break;
    case 'success':
      Materialize.toast(msg, 4000);
      break;
  }
}

function open_new_tab(url)
{
  const win = window.open(url, '_blank');
  win.focus();
}

function scrollToContent()
{
  const backgroundHeight = $('#home-background').height();
  const navbarHeight = $('.navbar-fixed').height();

  window.scroll({
    top: backgroundHeight - navbarHeight,
    left: 0,
    behavior: 'smooth'
  });
}

function getAllEvents()
{
  // $.get("lib/actions.php?action=get_events").done(function (data)
  // {
  //   if (data != null)
  //   {
  //     const events = JSON.parse(data);
  //     for (i = 0; i < events.length; i++) {
  //       console.log(events[i].name);
  //     }
  //   }
  //   // else
  //     // show_dialog(messages.unknown_error);
  //
  // }).fail(function ()
  // {
  //   // show_dialog(messages.unknown_error);
  // });
}

function addMessage(event,language)
{
  language = language[0].id;

  event.preventDefault();
  const message =
    {
      firstname: $('#firstname').val(),
      lastname: $('#lastname').val(),
      email: $('#email').val(),
      subject: $('#subject').val(),
      message: $('#message').val(),
    };

  if (
    message.email != '' &&
    message.subject != '' &&
    message.message != ''
  )
  {
    $.get("lib/actions.php?action=add_message", message)
    .done(function (is_added)
    {
      if (is_added)
      {
        show_dialog(messages.message_added,language);
      }
      else
        show_dialog(messages.unknown_error,language);
    })
    .fail(function ()
    {
      show_dialog(messages.unknown_error,language);
    });

  }
  else
  {
    show_dialog(messages.empty_fields,language);
  }
}


function addSubscriber(language)
{
  const subscriber =
  {
    email: $('#subscriber-email').val()
  };

  if (subscriber.email)
  {
    $.get("lib/actions.php?action=add_subscriber", subscriber)
      .done(function (response)
      {
        if (response)
          show_dialog(messages.success_email,language);
        else
          show_dialog(messages.unknown_error,language);
      })
      .fail(function ()
      {
        show_dialog(messages.unknown_error,language);
      });
  }
  else
  {
    show_dialog(messages.invalid_email,language);
  }
}
