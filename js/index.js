$(document).ready(function () {
  $.get("../api/session.php", function (response) {
    author = response.replace(/^\"|\"$/g, "");

    const data = { author: author };
    console.log(data);
  });
  const table = $(".js-tbody");
  $.get("../api/get_article.php", function (res) {
    const articles = res[0];
    const articleSize = res[1];

    if (articleSize === 0) {
      return;
    }

    console.log(articles);
    articles.forEach((element) => {
      const html = `<tr class="search_row">
      <td class="article-author">${element.author}</td>
          <td class="article-title"><a href="#" id="${element.id}">${element.title}</a></td>
          <td class="article-time">${element.time}</td>
          <tr>
          `;
      table.append(html);
    });
  });

  $("#floatingInput").keyup(function (e) {
    e.preventDefault();

    const value = $("#floatingInput").val();
    if (!value) {
      return;
    }
    const data = {
      search: value,
    };

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../api/search_article.php",
      data: data,
      // ------------------------------------------------------
      success: function (res) {
        $(".search_row").remove();
        const articles = res[0];
        const articleSize = res[1];

        if (articleSize === 0) {
          $(".search_row").remove();
          return;
        }
        articles.forEach((element) => {
          const html = `<tr class="search_row">
          <td class="article-author">${element.author}</td>
          <td class="article-title"><a href="#" id="${element.id}">${element.title}</a></td>
          <td class="article-time">${element.time}</td><tr>
          `;
          table.append(html);
        });
      },

      error: function (err) {
        console.error(err);
      },
    });
  });
  table.on("click", "a", function () {
    // let href = $(this).closest(".search_row"),
    // id = href.find(".article-id").text();
    let id = $(this).attr("id");
    const data = {
      id: id,
    };
    console.log(data);

    $.ajax({
      type: "GET",
      url: "../api/detail.php",
      data: data,
      dataType: "json",
      success: function (res) {
        const articles = res[0];
        const articleSize = res[1];
        if (articleSize === 0) {
          return;
        }
        if (articles.author) {
        }
      },
    });
  });
});
