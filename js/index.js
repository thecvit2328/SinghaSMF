var step = 1
var txt_name = ''
var txt_caption = ''
var photo_file = ''
var fb_tame_head = ''
var fb_uid = ''
var fb_name = ''

jQuery(document).ready(function($) {
  $('.game-step-2').hide()
})

function login() {
  FB.login(function(response) {
    if (response.authResponse) {
      FB.api('/me', function(response) {
        fb_uid = response.id
        fb_name = response.name
        // EMAIL = response.email;
        // FB_LINK = response.link;
        // tame_head = 'https://graph.facebook.com/' + fb_uid + '/picture?width=96&height=96'
        // $('#yourname').val(fb_name)
      })
    } else {
      // top.window.location = 'https://www.facebook.com/xxxxx';
    }
  }) //publish_actions
  // }, {scope: 'email,user_likes,user_friends'});//publish_actions
}

var basic = $('.photo-crop').croppie({
  viewport: {
    width: 300,
    height: 300
  },
  mouseWheelZoom: true
})

//https://jsfiddle.net/michaelyuen/5f2wwafp/

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader()
    reader.onload = function(e) {
      basic.croppie('bind', {
        url: e.target.result
      })

      $('.col-playzone, .col-btn, .step3, .frame-border, .frame-focus, .frame-singhs').hide()
      $('.game-step-2').show()
    }
    reader.readAsDataURL(input.files[0])
  }
}

$(document).delegate('.btn-next', 'click', event => {
  if (step == 1) {
    $(' .frame-border, .frame-focus, .frame-singhs').show()
    step = step + 1
  } else if (step == 2) {
    // upload crop images
    basic
      .croppie('result', {
        type: 'canvas',
        size: 'viewport'
      })
      .then(function(resp) {
        $.ajax({
          url: 'uploadcrop.php',
          type: 'POST',
          data: { image: resp },
          success: function(data) {
            $('.step3').show()
            $('.step').hide()
            photo_file = data
            html = '<img src="photos/' + data + '" />'
            $('.step3 .frame-photo').html(html)
          }
        })
      })
    step = step + 1
  } else if (step == 3) {
    txt_name = $('#yourname').val()
    $.ajax({
      url: 'mergephoto.php',
      type: 'POST',
      data: { image: photo_file, yourname: txt_name },
      success: function(data) {
        photo_file = data
        $('.col-photos img').attr('src', './photos/' + photo_file)
        $('.container').hide()
        $('.share-container').show()
      }
    })
    step = 1
  }
})

$(document).delegate('.btn-prev', 'click', function(event) {
  console.log({ step })
  if (step == 3) {
    $('.col-playzone, .col-btn').show()
    $('.game-step-2, .step3, .frame-border, .frame-focus, .frame-singhs').hide()
  } else if (step == 2) {
    $(' .frame-border, .frame-focus, .frame-singhs').hide()
  }
  step = 1
})

$('#imgInp').change(function() {
  readURL(this)
})

$(document).delegate('#btn-share-fb', 'click', function(event) {
  txt_caption = $('#share-input').val()
  // var obj = {
  //   method: 'feed',
  //   display: 'iframe',
  //   hashtag: '#SinghaDrinkingWater',
  //   name: 'ทำไมต้องดื่มสิ่งที่ใช่',
  //   caption: '',
  //   description: txt_caption,
  //   picture: 'http://www.singhasmf.com/photos/' + photo_file,
  //   link: 'https://singhasmf.com/'
  // }

  var obj = {
    method: 'share_open_graph',
    action_type: 'og.shares',
    hashtag: '#SinghaDrinkingWater',
    action_properties: JSON.stringify({
      object: {
        'og:url': 'https://singhasmf.com/',
        'og:title': 'ทำไมต้องดื่มสิ่งที่ใช่',
        'og:description': txt_caption,
        'og:image': 'http://www.singhasmf.com/photos/' + photo_file
      }
    })
  }
  function callback(response) {
    console.log({ fb_uid, fb_name, txt_name, txt_caption, photo_file })
    console.log({ response })
    if (response && !response.error_message) {
      console.log('Posting completed.')
    } else {
      console.log('Error while posting.')
    }
    saveData(fb_uid, fb_name, txt_name, txt_caption, photo_file, response)
  }
  FB.ui(obj, callback)
})

function saveData(fb_uid, fb_name, txt_name, txt_caption, photo_file, FBResp) {
  $.post()

  var formData = new Array()
  // var formData = $('#frm_data').serializeArray()
  formData.push({ name: 'action', value: 'register_data' })
  formData.push({ name: 'fb_uid', value: fb_uid })
  formData.push({ name: 'fb_name', value: fb_name })
  formData.push({ name: 'txt_name', value: txt_name })
  formData.push({ name: 'txt_caption', value: txt_caption })
  formData.push({ name: 'photo_file', value: photo_file })
  console.log(formData)

  $.ajax({
    url: 'process.php',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
    success: function(data) {
      console.log(data)
      alert('ขอบคุณที่ร่วมสนุก\nทางเราได้ทำการบันทึกข้อมูลของท่านเรียบร้อยแล้ว ขอบคุณค่ะ!')
      // reset()
      window.location.reload()
    }
  })
}

function reset() {
  step = 1
  txt_name = ''
  txt_caption = ''
  photo_file = ''
  $('.share-container').hide()
  $('.register-container').show()
  $('.step3').hide()
  $('.step').show()
  $('#yourname').val('')
  $('#share-input').val('')
  $('.col-playzone, .col-btn').show()
  $('.game-step-2, .step3').hide()
}
