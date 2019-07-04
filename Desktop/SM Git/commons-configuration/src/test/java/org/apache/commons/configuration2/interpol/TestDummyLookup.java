/*
 * Licensed to the Apache Software Foundation (ASF) under one or more
 * contributor license agreements.  See the NOTICE file distributed with
 * this work for additional information regarding copyright ownership.
 * The ASF licenses this file to You under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with
 * the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
package org.apache.commons.configuration2.interpol;

import static org.junit.Assert.assertNull;

import org.junit.Test;

/**
 * Test class for {@code DummyLookup}.
 *
 * @version $Id$
 */
public class TestDummyLookup
{
    /**
     * Tests the lookup() method.
     */
    @Test
    public void testLookup()
    {
        assertNull("Got a result (1)",
                DummyLookup.INSTANCE.lookup("someVariable"));
        assertNull("Got a result (2)", DummyLookup.INSTANCE.lookup(null));
    }
}
