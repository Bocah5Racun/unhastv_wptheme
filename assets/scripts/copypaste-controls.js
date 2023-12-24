let clipboardAllowed;
navigator.permissions.query({ name: "clipboard-write" }).then((result) => {
  clipboardAllowed =
    result.state == "granted" || result.state == "prompt" ? true : false;
  if (clipboardAllowed) {
    document
      .querySelectorAll(".copy")
      .forEach((copyItem) => (copyItem.style.display = "inline-block"));
  }
});
const copyToClipboard = async (textToCopy) => {
  try {
    await navigator.clipboard.writeText(textToCopy);
  } catch (err) {
    console.error("Failed to copy to clipboard: ", err);
  }
};
