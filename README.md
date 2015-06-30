# Technical test

Develop a simple application, which simulates a vector-based drawing program.

Your application should support the following 5 drawing primitives
(we'll call them widgets):

1) rectangle
2) square
3) ellipse
4) circle
5) textbox

The application should listen for command line input and allow a user to Add a new widget to the drawing, stating the location and size/shape of the widget.

The location should be a standard x/y coordinate on an imaginary page.
The size/shape depends on the widget, as follows:
- rectangle – width and height
- square – width
- ellipse –horizontal and vertical diameter
- circle – diameter
- textbox – bounding rectangle (i.e., the rectangle which surrounds
the textbox;  the text will be centered within this rectangle).

Your application should be able to process the following case-insensitive commands:

Rectangle 10 10 30 40 	// parameters: x, y, width, height
Square 15 30 35		// x, y, size
Ellipse 100 150 300 200	// x, y, horizontal diameter, vertical diameter
Circle	1 1 300		// x, y, size
Textbox 5 5 200 100 “sample text”	// x, y, width, height, text
Move 8 100 200	// Moves shape with ID=8 to x=100, y=200
Print	// Should output the current drawing


Do not draw any real graphics. Only echo text based output. 
The output of “Print” should be of the format (including IDs for each shape):

## Current Drawing

    #1 Rectangle x=10, y=10, width=30 height=40
    #2 Square x=15, y=30, size=35
    #3 Ellipse x=100, y=150, horizontal diameter=300, vertical diameter = 200
    #4 Circle x=1, y=1, size=300
    #5 Textbox x=5, y=5, width=200, height=100, text="sample text"

## More OOP

Please extend the solution to support output to multiple presentation media: console(ASCII) as in exercise 1, web (using basic HTML primitives: divs with text are sufficient), possibly something else.

Even though it will be run from command line, the idea is that it will be part of some library that can be used for both CLI and Web.

### NOTE:

- The application in both exercises must be runnable from the command line
- Use good object oriented design to make the software easy to extend for common features usually found in drawing programs (Don't implement any of these features!)
- Do not use any frameworks, nor 3rd-party PHP libraries.
- there is no need to worry about rotation.
- integer units are fine for all dimensions.
- No tests needed


# Run the application

Run `php index.php`

## Commands

    Rectangle 10 10 30 40     // parameters: x, y, width, height
    Square 15 30 35           // x, y, size
    Ellipse 100 150 300 200   // x, y, horizontal diameter, vertical diameter
    Circle 1 1 300            // x, y, size
    Textbox 5 5 200 100 \"sample text\"   // x, y, width, height, text
    Move 8 100 200            // Moves shape with ID=8 to x=100, y=200
    Print                     // Output the current drawing using ASCII
    PrintWeb                  // Output the current drawing using Web
    Help                      // Print this message
    Exit                      // Exit
    
Default arguments are zeros.   
    
