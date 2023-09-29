<?php

namespace bradoctech\Brandenburg\Test;

use bradoctech\Brandenburg\Policy;

class PolicyTest extends TestCase
{
    public function testPolicyReturnsGatePolicies()
    {
        $this->assertContains('articles_publish', Policy::all());
        $this->assertContains('articles_draft', Policy::all());
    }
}
