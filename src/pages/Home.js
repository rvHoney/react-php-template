export default function Home() {
  function handleClick(page) {
    window.location.href = page;
  }
    return (
      <div>
        <h1>Accueil</h1>
        <button onClick={() => handleClick("users")}>Page des membres (démo)</button>
        <button onClick={() => handleClick("rptpanel")}>Panel Web (Soon)</button>
      </div>
    );
}