export default function MemberCard({ id, name, email, description }) {
    return (
        <div style={{ width: 'fit-content', border: '1px solid black' }}>
            <h3>[{id}] {name}</h3>
            <p>{email}</p>
            <p>{description}</p>
        </div>
    );
}