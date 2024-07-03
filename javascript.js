function sdm(audioBlob) {
	const audioUrl = URL.createObjectURL(audioBlob);
const audioElement = new Audio(audioUrl);
audioElement.play();
}

sdm(audioBlob);