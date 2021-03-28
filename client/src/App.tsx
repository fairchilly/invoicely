import React from 'react';
import { Container } from 'semantic-ui-react';
import TopNav from './common/TopNav';
import HomePage from './pages/home/HomePage';

function App() {
  return (
    <div style={{ paddingBottom: '5rem' }}>
      <TopNav />
      <Container>
        <HomePage />
      </Container>
    </div>
  );
}

export default App;
