$(document).ready(function () {
  const pad = (v) => {
    return v < 10 ? "0" + v : v;
  };

  const getDateString = (d) => {
    let year = d.getFullYear();
    let month = pad(d.getMonth() + 1);
    let day = pad(d.getDate());
    let hour = pad(d.getHours());
    let min = pad(d.getMinutes());
    let sec = pad(d.getSeconds());
    return `${year}-${month}-${day} ${hour}:${min}:${sec}`;
  };
  let author = "";
  const articleArea = $(".article-area");

  $.get("../api/session.php", function (response) {
    author = response.replace(/^\"|\"$/g, "");

    const data = { author: author };
    console.log(data);

    $.ajax({
      type: "GET",
      dataType: "json",
      url: "../api/get_article.php",
      data: data,
      success: function (res) {
        const articles = res[0];
        const articleSize = res[1];

        if (articleSize === 0) {
          return;
        }

        articles.forEach((element) => {
          const html = `<div class="post"><div class="article-title d-flex">${element.title}<div><button type="button" class="edit justify-content-md-end" data-toggle="modal" data-target="#Edit-Modal" data-whatever="@mdo"><span class="fas fa-edit"></span></button>
            <button type="button" class="delete justify-content-md-end"><span class="fas fa-trash-alt delete"></span></button></div></div>
          <div class="article-id" style="display: none;">${element.id}</div>
          <div class="text-end">

          </div>
          <div class="article-time">${element.time}</div>
          <div class="article-content">${element.content}</div></div>
          
          `;
          articleArea.append(html);
        });
      },
      error: function (err) {
        console.error(err);
      },
    });
  });

  $("#create").click(function (e) {
    e.preventDefault();
    const data = {
      author: author,
      title: $("#title").val(),
      content: $("#content").val(),
    };

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../api/post.php",
      data: data,
      cache: false,
      // ------------------------------------------------------
      success: function (res) {
        const status = res["status"];
        const id = res["id"];
        if (status === 1) {
          const date = new Date();
          const time = getDateString(date);
          const html = `<div class="post">
          <div class="article-title">${data.title}<button type="button" class="edit" data-toggle="modal" data-target="#Edit-Modal" data-whatever="@mdo"><span class="fas fa-edit"></span></button>
            <button type="button" class="delete"><span class="fas fa-trash-alt delete"></span></button></div>
          <div class="article-id" style="display: none;">${id}</div>
          <div class="text-end">
            
          </div>
          <div class="article-time">${time}</div>
          <div class="article-content">${data.content}</div>
          </div>
          `;

          articleArea.append(html);
        }
      },

      error: function (err) {
        console.error(err);
      },
    });
  });
  articleArea.on("click", ".edit", function (e) {
    e.preventDefault();
    let post = $(this).closest(".post"),
      id = post.find(".article-id").text();
    $("#update").click(function (event) {
      event.preventDefault();
      const data = {
        new_title: $("#edit-title").val(),
        new_content: $("#edit-content").val(),
        id: id,
      };
      console.log(data);
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../api/edit.php",
        data: data,
        success: function (res) {
          post.remove();
          console.log(res);
          const date = new Date();
          const new_time = getDateString(date);
          const html = `<div class="post">
          <div class="article-title">${data.new_title}<button type="button" class="edit" data-toggle="modal" data-target="#Edit-Modal" data-whatever="@mdo"><span class="fas fa-edit"></span></button>
            <button type="button" class="delete"><span class="fas fa-trash-alt delete"></span></button></div>
          <div class="article-id" style="display: none;">${data.id}</div>
          <div class="text-end">
            
          </div>
          <div class="article-time">${new_time}</div>
          <div class="article-content">${data.new_content}</div>
          </div>
          `;

          articleArea.append(html);
        },
        error: function (err) {
          console.error(err);
        },
      });
    });
  });

  articleArea.on("click", ".delete", function (e) {
    e.preventDefault();
    let post = $(this).closest(".post"),
      id = post.find(".article-id").text();
    const data = {
      id: id,
    };
    console.log(data);
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../api/delete.php",
      data: data,
      success: function (res) {
        post.remove();
        console.log(res);
      },
      error: function (err) {
        console.error(err);
      },
    });
  });
});
