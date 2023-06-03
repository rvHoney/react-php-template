export default function Home() {
  function handleClick() {
    window.location.href = "/members";
  }

    return (
      <div>
        <h1>Home</h1>
        <button onClick={handleClick}>Click to go to the members page</button>
      </div>
    );
}