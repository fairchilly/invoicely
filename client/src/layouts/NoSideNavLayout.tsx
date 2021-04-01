import React from 'react';
import TopNav from '../common/TopNav';
import { Container } from 'semantic-ui-react';

const NoSideNavLayout: React.FC = ({ children }) => {
  return (
    <section className='no-side-nav'>
      <TopNav />
      <Container>
        <main style={{ paddingBottom: '2rem' }}>{children}</main>
      </Container>
    </section>
  );
};

export default NoSideNavLayout;
