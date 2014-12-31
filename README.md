module-gallery
==============

A simple front-end pattern library.

## How to Use It
1. Download the zip
2. In the /patterns folder, add your own folders with HTML snippets.
3. In the /patterns folder, create .json files (I like to name mine the same as I name the folders, the name of the module/pattern)
4. In the .json files set the properties:

    {
      "title" : "Name Of Module/Pattern",

      "types" : [
        {
          "name" : "Name of This Type",
          "src"  : "relative/path/to/html/snippet.html",
          "info" : "Any notes you want to appear with the markup. Can be blank."
        }
      ]
    }

For example, the demo buttons.json looks like this:

    {
      "title" : "buttons",
      "types" : [
        {
          "name" : "normal",
          "src" : "buttons/index.html",
          "info" : ""
        },
        {
          "name" : "special",
          "src" : "buttons/special.html",
          "info" : ""
        }
      ]
    }
