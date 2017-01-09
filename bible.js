var jsBible = {

	"bibleTextByBook": {},

	"initializeUi": function()
	{
		$(document.getElementById("back-to-index")).on('click', function(e) {

			document.getElementById("book-list").style.display 		= 'block';
			document.getElementById("bible-contents").style.display = 'none';
			document.getElementById("back-to-index").style.display 	= 'none';
			document.getElementById("header-title").innerHTML 		= 'Jerusalem Bible';
		});
	},

	"putVerses": function(book, chapter)
	{
		document.getElementById("verse-list").innerHTML = "";
		
		for (i in jsBible.bibleTextByBook[book][chapter])
		{
			if (i != 0)
			{
				document.getElementById("verse-list").innerHTML += 
					"<li class='verse'>" +
					"<span class='verse-number'>" + i + "</span> " + 
					jsBible.bibleTextByBook[book][chapter][i] +
					"</li>";
			}
		}

		window.scrollTo(0, 0);
	},

	"putBookChapter": function(book, chapter, bookLongName)
	{
		if (bookLongName)
		{
			document.getElementById("header-title").innerHTML = bookLongName;
		}

		jsBible.putChapterLinks(book);
		jsBible.putChapter(chapter);
		jsBible.putVerses(book, chapter);
	},

	"putChapter": function(chapter)
	{
		document.getElementById("lista-capitulos")
			.getElementsByTagName("a")[chapter-1]
			.className = "active";
			
		document.getElementById("title-chapter").innerHTML = chapter;
	},

	"putChapterLinks": function(book)
	{
		document.getElementById("lista-capitulos").innerHTML = "";

		for (i in jsBible.bibleTextByBook[book])
		{
			if (i != 0)
			{
				newLink = document.createElement("a");
				newLink.setAttribute("href", "javascript:void(0)");
				newLink.innerHTML = i;
				(function(i) {
					$(newLink).on("click", function(e) 
					{
						jsBible.putBookChapter(book, i);
					});
				})(i);
				document.getElementById("lista-capitulos").appendChild(newLink);
			}
		}
	},

	"readBook": function(book, link)
	{
		document.getElementById("book-list").style.display 		= 'none';
		document.getElementById("bible-contents").style.display = 'block';
		document.getElementById("back-to-index").style.display 	= 'inline';
		
		jsBible.putBookChapter(book, 1, link.innerHTML);
	}
};

$(document).ready(function() {

	jsBible.bibleTextByBook = bibleText;
	jsBible.initializeUi();
});