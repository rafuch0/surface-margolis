<?php

if (isset($_GET['3141592654'])) die(highlight_file(__FILE__, 1));

function getPageJS($canvas, $width, $height)
{
	$output = '';

	$output .= '<script src="surface.js"></script>';

	$output .= '<script>';

	$output .= "var canvas = '$canvas';";
	$output .= "var width = '$width';";
	$output .= "var height = '$height';";

	$output .= <<< 'EOD'

function randomValue()
{
	if(Math.random() > 0.5)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function fixX(x)
{
	return ((width + (x))%width);
}

function fixY(y)
{
	return ((height + (y))%height);
}

var buffer;
var rules;
function automataInit()
{
	buffer = new Array(width*height);

	if(Math.random() < 0.05)
	{
		rules = [[false,false,false,false,false,false],[true,false,false,false,false,false],[false,true,false,false,false,false],[false,false,false,false,false,false],[false,true,false,false,false,false],[false,false,false,false,false,false],[false,false,true,true,false,false],[true,false,false,false,false,false],[true,false,false,false,false,false],[false,false,true,true,false,false],[false,false,false,false,false,false],[false,true,false,false,false,false],[false,false,false,false,false,false],[false,true,false,false,false,false],[true,false,false,false,false,false],[false,false,false,false,false,false]];
	}
	else
	{
	        rules = [[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)],[((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false),((Math.random()>0.5)?true:false)]];
	}


	if(Math.random() > 0.5)
	{
		for(var offsetY = 0; offsetY < height; offsetY++)
		{
			for(var offsetX = 0; offsetX < width; offsetX++)
			{
				buffer[offsetX+offsetY*width] = ((offsetY >= (height/4)) && (offsetY < (height - (height/4))) && (offsetX >= (width/4)) && (offsetX < (width - (width/4))))?true:false;
			}
		}
	}
	else
	{
		for(var offsetY = 0; offsetY < height; offsetY++)
		{
			for(var offsetX = 0; offsetX < width; offsetX++)
			{
				buffer[offsetX+offsetY*width] = randomValue();
			}
		}
	}
}

var temp;
function swap(x1,y1,x2,y2)
{
	temp = buffer[fixX(x1) + fixY(y1)*width];
	buffer[fixX(x1) + fixY(y1)*width] = buffer[fixX(x2) + fixY(y2)*width];
	buffer[fixX(x2) + fixY(y2)*width] = temp;

	if(buffer[fixX(x1) + fixY(y1)*width] != buffer[fixX(x2) + fixY(y2)*width])
	{
		buffer[fixX(x1) + fixY(y1)*width]?Surface.plot(x1, y1, '0xFFFFFF'):Surface.plot(x1, y1, '0x000000');
		buffer[fixX(x2) + fixY(y2)*width]?Surface.plot(x2, y2, '0xFFFFFF'):Surface.plot(x2, y2, '0x000000');
	}
}

var i;
function doTransition(x,y,currState)
{
	for(i = 0; i < 6; i++)
	{
		if(rules[currState][i])
		{
			switch(i)
			{
				case 0:
					swap(x,y,x+1,y+1);
				break;

				case 1:
					swap(x+1,y,x,y+1);
				break;

				case 2:
					swap(x,y,x+1,y);
				break;

				case 3:
					swap(x,y+1,x+1,y+1);
				break;

				case 4:
					swap(x,y,x,y+1);
				break;

				case 5:
					swap(x+1,y,x+1,y+1);
				break;
			}
		}
	}
}

var evenodd = 0;
var currentX;
var currentY;

function getConfiguration(x,y)
{
	return (buffer[fixX(x+1) + fixY(y+1)*width]?8:0) + (buffer[fixX(x) + fixY(y+1)*width]?4:0) + (buffer[fixX(x+1) + fixY(y)*width]?2:0) + (buffer[fixX(x) + fixY(y)*width]?1:0);
}

function nextGeneration()
{
	evenodd ^= 1;

	for(currentY=evenodd; currentY < height; currentY += 2)
	{
		for(currentX=evenodd; currentX < width; currentX += 2)
		{
			doTransition(currentY, currentX, getConfiguration(currentY, currentX));
		}
	}
}

function automataLoop()
{
	nextGeneration();

	Surface.render();
}

function main(canvas, width, height, mainFunc, loopFunc)
{
	var canvasContext = document.getElementById(canvas);

	Surface.init(canvasContext, width, height);

	mainFunc();

	Surface.loop(loopFunc, 60);
}

main(canvas, width, height, automataInit, automataLoop);

EOD;
	$output .= '</script>';

	return $output;
}

function getPageHTML($canvas, $width, $height)
{
	$output = '';

	$output .= '<!DOCTYPE html>';
	$output .= '<html>';

		$output .= '<head>';

		$output .= '</head>';

		$output .= '<body>';

		$output .= '<canvas id="'.$canvas.'" width="'.$width.'" height="'.$height.'">';
		$output .= 'herp derp nice browser';
		$output .= '</canvas>';

		$output .= getPageJS($canvas, $width, $height);

		$output .= '</body>';

	$output .= '</html>';

	return $output;
}

$output = '';

$output .= getPageHTML('canvas', 64, 64);

echo $output;

?>
