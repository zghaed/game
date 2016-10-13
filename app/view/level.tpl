<h1 id="title">CodeReadingDojo</h1>
<img id="level-logo" src="<?= BASE_URL ?>/public/img/1/1.png" alt="Level One" />

<div id="scores">
	<span id="first-score" class="star-icon">☆</span>
	<span id="second-score" class="star-icon">☆</span>
	<span id="third-score" class="star-icon">☆</span>
</div>

<div id="code-content">
<pre id="code">
int binarySearch ( element,list ) {
int low = 0;
int high = list.length; 
int mid;
while ( low &lt;= high ) {
	mid = ( low + high ) / 2;
	if ( list[mid] == mid )
		return mid;
	if ( list[mid] &gt; element )
		low = mid + 1;
	else
		high = mid - 1;
}
return -1;
</pre>
</div>

<button id="start-button">Start</button>
