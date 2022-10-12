$(document).ready(function () {
  $('form').validate()

  var startDate = $('#starting_date')
  var endDate = $('#ending_date')
  if (typeof startDate !== 'undefined' && typeof endDate !== 'undefined') {

    var opt = {
      singleDatePicker: true,
      minYear: 2022,
      startDate: moment(),
      timePicker: true,
      timePicker24Hour: true,
      locale: {
        format: 'YYYY-MM-DD HH:mm:ss',
      }
    }

    startDate.daterangepicker(opt, function (start, end, label) {
      opt.minDate = start.format('YYYY-MM-DD HH:mm:ss')
      endDate.daterangepicker(opt)
    })

    opt.minDate = startDate.val()
    endDate.daterangepicker(opt)
  }

  //remove alert
  setTimeout(function () {
    if (typeof $('.alert') !== 'undefined') {
      $('.alert').remove()
    }
  }, 3000)

  //confirm delete work
  $('.delete-work').on('click', function (e) {
    e.preventDefault()

    var href = $(this).attr('href')

    if (confirm('Are you sure to delete?') == true) {
      window.location.href = href
    }
  })
})