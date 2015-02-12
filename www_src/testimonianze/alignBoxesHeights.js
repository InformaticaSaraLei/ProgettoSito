function alignBoxesHeights()
{
	var boxNumber;
	var els;
	var index;
	var maxHeight;

	boxNumber = 1;
	els = document.getElementsByClassName('thumbnail box' + boxNumber);

	while (els.length > 0) {
		maxHeight = els[0].clientHeight;
		for (index = 1; index < els.length; ++index)
		{
			if (els[index].clientHeight > maxHeight)
				maxHeight = els[index].clientHeight;
		}
		for (index = 0; index < els.length; ++index)
		{
			els[index].style.height = maxHeight + 'px';
		}
		
		boxNumber++;
		els = document.getElementsByClassName('thumbnail box' + boxNumber);
	}
}