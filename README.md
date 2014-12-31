Module Gallery
==============

A simple front-end pattern library.

## Demo
[http://modulegallery.keithwyland.com/](http://modulegallery.keithwyland.com/)

## How to Use It
1. Download the zip
2. In the /patterns folder, add your own folders with HTML snippets.
3. In the /patterns folder, create .json files (I like to name mine the same as I name the folders, the name of the module/pattern)
4. In the .json files set the properties (more on that below).
5. In index.php, change the path of style.css to the path of your project's stylesheet.
5. Navigate to index.php (with a server running, of course, if you're doing this locally).
6. You can also click on the titles of modules/patterns to display only that one.

### .json files
Here's the rundown on what each property is:
```
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
```
For example, the demo buttons.json looks like this:
```
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
```

## Acknowledgments
* The PHP is based on Jeremy Keith's [Pattern Primer](https://github.com/adactio/Pattern-Primer). I wanted a way to have "types" or variations of one pattern, so I added the .json file set up, but the PHP is doing basically the same thing as Pattern Primer. If you just want to drop HTML files in a folder without messing around with .json files, check out [Pattern Primer](https://github.com/adactio/Pattern-Primer). (or [barebones](https://github.com/paulrobertlloyd/barebones), which is also based on Pattern Primer)
* The responsive tabs are the work of Chris Coyier. He put a codepen together called [Transformer Tabs](http://codepen.io/chriscoyier/pen/gHnGD), and it met my requirements. Just tweaked the styling.
* `<details>` support isn't quite there in some older browsers, so I used Mathias Bynen's [jQuery details](https://github.com/mathiasbynens/jquery-details) plugin.
